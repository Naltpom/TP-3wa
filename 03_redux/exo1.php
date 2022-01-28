<?php
namespace Exercice;

static $initialState = [
    'count' => 0
];

const INCREMENT = "INCREMENT";
const DECREMENT = "DECREMENT";

class Store
{
    public function __construct(
        public $reducer,
        public $state
    ) {}

    public function subscribe($state)
    {
    }

    public function dispatch(Action $action)
    {
        match ($action->type) {
            INCREMENT => $this->state['count'] += $action->action['number'],
            DECREMENT => $this->state['count'] -= $action->action['number'],
        };
        echo $this->state['count'] . PHP_EOL;
    }
}

class Action
{
    public function __construct(public string $type, public array $action)  {}
}

$reducer = function() { return ; };

$store = new Store(reducer : $reducer, state : $initialState);

$store->dispatch(new Action(type : INCREMENT, action : ['number' => 1] )); // 1
$store->dispatch(new Action(type : INCREMENT, action : ['number' => 1] )); // 2
$store->dispatch(new Action(type : DECREMENT, action : ['number' => 1] )); // 1
$store->dispatch(new Action(type : INCREMENT, action : ['number' => 1] )); // 2
$store->dispatch(new Action(type : INCREMENT, action : ['number' => 1] )); // 3
$store->dispatch(new Action(type : INCREMENT, action : ['number' => 1] )); // 4
$store->dispatch(new Action(type : INCREMENT, action : ['number' => 1] )); // 5