<?php

namespace Oop\Exam\Container;


use Oop\Exam\Controllers\InputPageController;
use Oop\Exam\Framework\Router;
use Oop\Exam\Controllers\HomePageController;
use Oop\Exam\Repository\DataRepository;
use RuntimeException;

class DIContainer
{
    private array $entries = [];

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new RuntimeException('Class ' . $id . ' not found in container.');
        }
        $entry = $this->entries[$id];

        return $entry($this);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $callable): void
    {
        $this->entries[$id] = $callable;
    }

    public function loadDependencies()
    {

        $this->set(
            Router::class,
            function (DIContainer $container) {
                return new Router(
                    $container->get(HomePageController::class),
                    $container->get(InputPageController::class)
                );
            }
        );

        $this->set(
            HomePageController::class,
            function (DIContainer $container) {
                return new HomePageController();
            }
        );

        $this->set(
            InputPageController::class,
            function (DIContainer $container) {
                return new InputPageController();
            }
        );

        $this->set(
            DataRepository::class,
            function (DIContainer $container) {
                return new DataRepository();
            }
        );
    //


    }

}