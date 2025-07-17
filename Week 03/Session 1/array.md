# Array

## Array Types
1. Index Array
   ```php
   $arr = array("Zeina", 23, true);
   // or
   $arr = ["Zeina", 23, true];
   
   // read one element
   echo $arr[0] . '<br />'; // Zeina
   // read all elements
   for ($i = 0; $i < count($arr); ++$i) {
       echo $arr[$i] . '<br/>';
   }
   
   // create element
   $arr[] = "PHP";
   
   // update element
   $arr[2] = false;
   
   // delete element
   unset($arr[3]);
   ```
2. Associative Array
   ```php
   $arr = [
        "name" => "Zeina",
        "age" => 23,
        "student" => false
   ];
   
   // read
   foreach ($arr as $key => $value) {
       echo "$key: $value <br/>";
   }
   
   // create
   $arr['email'] = "zeina@email.com";
   
   // update
   $arr['student'] = true;
   
   // delete
   unset($arr['student']);
   ```
3. Multidimensional Array
   ```php
   $arr = [
        "student 1" => [
            "name" => "Hana",
            "email" => "hana@email.com",
            "age" => 5
        ],
        "student 2" => [
            "name" => "Adam",
            "email" => "adam@email.com",
            "age" => 2
        ],
   ];
   
   // read one element
   echo $arr['student 1']['name'] . '<br />';
   // read all elements
   foreach ($arr as $no_student => $students) {
       echo "$no_student: <br />";
       foreach ($students as $key => $student) {
           echo "$key: $student <br />";
       }
   }
   
   // create
   $arr['student 3'] = [
        "name" => "Safa",
        "email" => "safa@email.com",
        "age" => 2
   ];
   
   // update
   $arr['student 2']['email'] = "adam@gmail.com";
   
   // delete
   unset($arr['student 3']);
   ```

## Examples
1. Given an array of names, check if the name "Zeina" exists or not:
  - if it exists, ⇒ print name is found.
  - if not ⇒, append it to the array and print the array.
  - Solution:
    ```php
    $names = ["Hana", "Safa", "Adam", "Yahya"];

    $name = "Zeina";
    $name_is_found = true;

    for ($i = 0; $i < count($names); $i++) {
        if ($names[$i] == $name) {
            $name_is_found = false;
            echo "Found <br />";
        }
    }

    if ($name_is_found) {
        echo "Not found <br />";
        $names[] = $name;
    }

    foreach ($names as $name) {
        echo $name . '<br />';
    }
    ```
    

