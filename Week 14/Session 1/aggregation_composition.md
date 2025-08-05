# Aggregation & Composition

- They are two important types of relationships between classes that represent "has-a" relationships, but they differ.

## Aggregation (Weak "Has-A" Relationship)
- One class uses another class, but both cah exist independently.
- The contained object can exist without the container.
- **Characteristics:**
  - Weaker relationship.
  - Objects can exist independently.
  - Shared ownership or no ownership.
- Example:
  ```php
  <?php
  
  // Students can exist without the university and can belong to multiple universities
  
  class Student {
      private string $name;
      private int $id;
      
      public function __construct(string $name, int $id)
      {
          $this->name = $name;
          $this->id = $id;
      }
      
      public function getName(): string
      {
          return $this->name;
      }
      
      public function getId(): int
      {
          return $this->id;
      }
      
      public function study(): string
      {
          return "$this->name is studying";
      }
  }
  
  class University
  {
      private string $name;
      private array $students;
      
      public function __construct(string $name)
      {
          $this->name = $name;
      }
      
      // Students are passed from outside, not created by University
      public function enrollStudent(Student $student): void
      {
          $this->students[] = $student;
      }
      
      public function removeStudent(Student $student)
      {
          $this->students = array_filter($this->students, fn($s) => $s->getId() !== $student->getId());
      }
      
      public function getUniversityInfo(): string
      {
          $count = count($this->students);
          return "University $this->name, Students: $count";
      }
  }
  
  $student1 = new Student('Hana', 1001);
  $student2 = new Student('Adam', 1002);
  
  $university = new University('Tech University');
  $university->enrollStudent($student1);
  $university->enrollStudent($student2);
  
  echo $university->getUniversityInfo() . '<br />';
  
  echo $student1->study() . '<br />';
  
  $university->removeStudent($student1);
  echo $student1->study() . ' (still exists after removal)';
  ```

## Composition (Strong "Has-A" Relationship)
- Composition represents a stronger relationship where one class owns another class completely.
- The contained object can't exist without the container, it's a "part of" relationship.
- **Characteristics:**
  - Stronger relationship.
  - Child objects cannot exist without the parent.
  - The parent owns the child's objects.
  - "Part of" relationship.
  - When parent is destroyed, children are destroyed too.
- Example
  ```php
  <?php
  
  // Rooms can't exist without a house, they are part of the house
  
  class Room
  {
      private string $name;
      private float $area;
      
      public function __construct(string $name, float $area) {
          $this->name = $name;
          $this->area = $area;
      }
      
      public function getName(): string {
          return $this->name;
      }
      
      public function getArea(): float {
          return $this->area;
      }
      
      public function getRoomInfo(): string {
          return "Room: $this->name, Area: $this->area sq ft";
      }
  }
  
  class House
  {
      private string $address;
      private array $rooms = [];
      
      public function __construct(string $address)
      {
          $this->address = $address;
          $this->createRooms();
      }
      
      private function createRooms(): void {
          $this->rooms[] = new Room("Living Room", 300.0);
          $this->rooms[] = new Room("Kitchen", 150.0);
          $this->rooms[] = new Room("Bedroom", 200.0);
          $this->rooms[] = new Room("Bathroom", 80.0);
      }
      
      public function addRoom(string $name, float $area): void {
          $this->rooms[] = new Room($name, $area);
      }
      
      public function getRooms(): array {
          return $this->rooms;
      }
      
      public function getTotalArea(): float {
          return array_sum(array_map(fn($room) => $room->getArea(), $this->rooms));
      }
      
      public function getHouseInfo(): string {
          $roomCount = count($this->rooms);
          $totalArea = $this->getTotalArea();
          return "House at {$this->address}: {$roomCount} rooms, {$totalArea} sq ft total";
      }
      
      // When a house is destroyed, rooms are automatically destroyed too
      public function __destruct() {
          echo "House at {$this->address} is being demolished. All rooms are destroyed.\n";
          $this->rooms = [];
      }
  }
  
  $house = new House('123 Main Street');
  echo $house->getHouseInfo() . '<br />';
  
  echo "Rooms in the house:<br />";
  foreach ($house->getRooms() as $room) {
      echo '- ' . $room->getRoomInfo() . '<br />';
  }
  
  $house->addRoom('Office', 120.0);
  echo 'After adding office:<br />';
  echo $house->getHouseInfo() . '<br />';
  
  // Rooms cannot exist independently of the house
  ```


