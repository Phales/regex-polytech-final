<?php
require 'tests/AlphabetTest.php';
require 'src/Automatons/Components/Alphabet/Symbol.php';
require 'src/Automatons/Exceptions/DuplicateItemException.php';
require 'src/Automatons/Set.php';
require 'src/Automatons/Components/Alphabet/Alphabet.php';
require 'src/Automatons/Components/States/State.php';
require 'src/Automatons/Components/States/StateSet.php';
require 'src/Automatons/Components/Transitions/Transition.php';
require 'src/Automatons/Components/Transitions/TransitionSet.php';
require 'src/Automatons/Automaton.php';
require 'src/Automatons/StateGroup.php';
require 'src/Automatons/StateGroupSet.php';
require 'src/Automatons/StateGroupMap.php';
require 'src/Automatons/Exceptions/InvalidSetException.php';
require 'src/Automatons/StateSetSet.php';
require 'src/Automatons/Utils/Helpers.php';
//require 'src/Automatons/Set.php';

use Autto\Components\Alphabet\Symbol;
use Autto\Components\Alphabet\Alphabet;
use Autto\Components\States\State;
use Autto\Components\States\StateSet;
use Autto\Components\Transitions\Transition;
use Autto\Components\Transitions\TransitionSet;
use Autto\Automaton;

$a = new Symbol('a');
$alphabet = new Alphabet;
$alphabet->add($a);

$q0 = new State('q0');
$etats = new StateSet;
$etats->add($q0);

$q1 = new State('q1');
$etats_initiaux = new StateSet;
$etats_initiaux->add($q1);

$etats->add($q1);

$cible_1 = new StateSet;
$cible_1->add($q0);
$cible_1->add($q1);

$transition_1 = new Transition($q1, $cible_1, $a);

$transitions = new TransitionSet;
$transitions->add($transition_1);

$etats_finaux = new StateSet;
$etats_finaux->add($q0);

$automate = new Automaton($etats, $alphabet, $transitions, $etats_initiaux, $etats_finaux);

$automate->determinize();

echo "IsDeterministic";
var_dump($automate->IsDeterministic());

echo "Etats initiaux";
var_dump($automate->getFinalStates());

echo "Etats finaux";
var_dump($automate->getInitialStates());

echo "Nombre d'états";
var_dump(count($automate->getStates()));

$automate->minimize();

echo "IsDeterministic";
var_dump($automate->IsDeterministic());

echo "Etats initiaux";
var_dump($automate->getFinalStates());

echo "Etats finaux";
var_dump($automate->getInitialStates());

echo "Nombre d'états";
var_dump(count($automate->getStates()));

//var_dump($automate->getTransitions()->toTargetSet());