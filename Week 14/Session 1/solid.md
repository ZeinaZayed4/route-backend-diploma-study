# SOLID Principles

- Principles to create maintainable, flexible, and robust object-oriented systems.

## Single Responsibility Principle (SRP)
- A class should have only one reason to change.
- Example:
    ```php
    <?php
    
    // Each class has a single responsibility
    
    class User
    {
        private string $name;
        private string $email;
        
        public function __construct(string $name, string $email)
        {
            $this->name = $name;
            $this->email = $email;
        }
        
        public function getName(): string
        {
            return $this->name;
        }
        
        public function getEmail(): string
        {
            return $this->email;
        }
    }
    
    class UserRepository
    {
        public function save(User $user): void
        {
            echo "Saving user {$user->getName()} to database...<br />";
        }
    }
    
    class EmailService
    {
        public function send(User $user, string $message): void
        {
            echo "Sending email to {$user->getEmail()}: $message<br />";
        }
    }
    
    $user = new User('Zeina', 'zeina@test.com');
    $repo = new UserRepository();
    $emailService = new EmailService();
    
    $repo->save($user);
    $emailService->send($user, "Welcome!");
    ```

## Open/Closed Principle (OCP)
- Classes should be open for extension but closed for modification.
- Example:
    ```php
    <?php
    
    interface DiscountInterface {
        public function calculate(float $amount): float;
    }
    
    class StudentDiscount implements DiscountInterface {
        public function calculate(float $amount): float {
            return $amount * 0.1;
        }
    }
    
    class SeniorDiscount implements DiscountInterface {
        public function calculate(float $amount): float {
            return $amount * 0.15;
        }
    }
    
    class VipDiscount implements DiscountInterface {
        public function calculate(float $amount): float {
            return $amount * 0.2;
        }
    }
    
    class DiscountCalculator {
        public function calculate(float $amount, DiscountInterface $discount): float {
            return $discount->calculate($amount);
        }
    }
    
    $calculator = new DiscountCalculator();
    $amount = 100.0;
    
    echo "Student discount: $" . $calculator->calculate($amount, new StudentDiscount()) . '<br />';
    echo "Senior discount: $" . $calculator->calculate($amount, new SeniorDiscount()) . '<br />';
    echo "VIP discount: $" . $calculator->calculate($amount, new VipDiscount()) . '<br />';
    ```

## Liskov Substitution Principle (LSP)
- Objects of a superclass should be replaceable with objects of its subclasses.
- Example:
    ```php
    <?php
    
    abstract class Shape {
        abstract public function getArea(): float;
    }
    
    class Rectangle extends Shape {
        private float $width;
        private float $height;
        
        public function __construct(float $width, float $height) {
            $this->width = $width;
            $this->height = $height;
        }
        
        public function getArea(): float {
            return $this->width * $this->height;
        }
    }
    
    class Square extends Shape {
        private float $side;
        
        public function __construct(float $side) {
            $this->side = $side;
        }
        
        public function getArea(): float {
            return $this->side * $this->side;
        }
    }
    
    function printArea(Shape $shape): void {
        echo "Area: " . $shape->getArea() . '<br />';
    }
    
    $rectangle = new Rectangle(5, 4);
    $square = new Square(5);
    
    printArea($rectangle);
    printArea($square);
    ```

## Interface Segregation Principle (ISP)
- Clients should not be forced to depend on interfaces they don't use.
- Example:
    ```php
    <?php
    
    interface Workable {
        public function work(): void;
    }
    
    interface Eatable {
        public function eat(): void;
    }
    
    interface Sleepable {
        public function sleep(): void;
    }
    
    class Human implements Workable, Eatable, Sleepable {
        public function work(): void { echo "Human working<br />"; }
        public function eat(): void { echo "Human eating<br />"; }
        public function sleep(): void { echo "Human sleeping<br />"; }
    }
    
    class Robot implements Workable {
        public function work(): void { echo "Robot working<br />"; }
    }
    
    class WorkManager {
        public function manageWork(Workable $worker): void {
            $worker->work();
        }
    }
    
    $human = new Human();
    $robot = new Robot();
    $manager = new WorkManager();
    
    $manager->manageWork($human);
    $manager->manageWork($robot);
    
    $human->eat();
    $human->sleep();
    ```

## Dependency Inversion Principle (DIP)
- High-level modules should not depend on low-level modules; both should depend on abstractions.
- Example:
    ```php
    <?php
    
    interface DatabaseInterface {
        public function save(string $data): void;
    }
    
    class MySQLDatabase implements DatabaseInterface {
        public function save(string $data): void {
            echo "Saving to MySQL: {$data}<br />";
        }
    }
    
    class PostgreSQLDatabase implements DatabaseInterface {
        public function save(string $data): void {
            echo "Saving to PostgreSQL: {$data}<br />";
        }
    }
    
    class UserService {
        private DatabaseInterface $database;
        
        public function __construct(DatabaseInterface $database) {
            $this->database = $database;
        }
        
        public function createUser(string $name): void {
            $this->database->save("User: {$name}");
        }
    }
    
    $mysqlDb = new MySQLDatabase();
    $postgresDb = new PostgreSQLDatabase();
    
    $userService1 = new UserService($mysqlDb);
    $userService2 = new UserService($postgresDb);
    
    $userService1->createUser("John");
    $userService2->createUser("Jane");
    
    class MockDatabase implements DatabaseInterface {
        public function save(string $data): void {
            echo "Mock save: {$data}<br />";
        }
    }
    
    $testService = new UserService(new MockDatabase());
    $testService->createUser("Test User");
    ```


