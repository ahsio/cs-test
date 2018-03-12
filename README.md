## The solution design:

The application Domain Driven structure separates well the Domain layer (the Model), the application layer (Mower moves) and the
infrastructure layer (the CLI command).

This separation allows to extends the Domain, the Application and the infrastructure independently from one another. The Domain
can than overrided by changing the way we designed the position, the Application can also be extended
by adding new mower moves possibilities and so we can do with the infrastructure by adding new entry points (HTTP, REST, ...)

Here's a Domain Driven design used to implement the sorting solution,

![mower](https://user-images.githubusercontent.com/1450211/37204167-40ced410-2390-11e8-9034-42c45afeaea0.jpg)


## How to install the application

The application needs [composer to be installed globally](https://getcomposer.org/doc/00-intro.md#globally). Then you've to run the following command,

```sh
make build
```


## How to run your application

```sh
php application.php  input.txt my_output_file.txt
```

## How to run phpspec tests

```sh
make test
```

## How to extend the application (Position design and mower moves)

Changing the way we designed the position is as easy as providing a new implementation of the `CS\Domain\Model\PositionInterface`.

```php
namespace CS\Domain\Model;

class NewPosition extends PositionInterface
{
    /**
     * {@inheritdoc}
     */
    public function switchDirection($instruction)
    {
        // implement here the new switchDirection logic
    }

    /**
     * {@inheritdoc}
     */
    public function moveForward()
    {
        // implement here the new moveForward logic
    }
}
```

The application design provides also other extension points, the mower move provided within the Mower manager can be overrided by extended the appropriate interface:

```php
namespace CS\Application;

class NewMower implements MowerInterface
{
    /**
     * {@inheritdoc}
     */
    public function applyInstructions(array $instructions)
    {
        // implement the specific instruction execution logic here
    }
}
```
