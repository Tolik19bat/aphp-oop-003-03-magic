<?php

declare(strict_types=1);

require_once 'autoload.php';

use classes\Person;
use classes\PeopleList;

// Создаем объект Person
$person = new Person('Сергей', 'Петросян');
echo $person . "\n";

// Сериализуем объект
$serializedPerson = serialize($person);
echo "Сериализованный объект: $serializedPerson\n";

// Десериализуем объект
$deserializedPerson = unserialize($serializedPerson);
echo $deserializedPerson . "\n";

// Переименовываем свойство через объект
$deserializedPerson->firstName = 'Евгений';

// Выводим свойства объекта
echo "Имя: " . $deserializedPerson->firstName . "\n";
echo "Фамилия: " . $deserializedPerson->lastName . "\n";

// Создаем список людей
$peopleList = new PeopleList();
$peopleList->addPerson(new Person('Иван', 'Иванов'));
$peopleList->addPerson(new Person('Сергей', 'Сергеев'));
$peopleList->addPerson(new Person('Пётр', 'Петров'));
// Перебираем список с помощью foreach
foreach ($peopleList as $person) {
    echo "Имя: " . $person->firstName . ", Фамилия: " . $person->lastName . "\n";
}
