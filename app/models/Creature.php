<?php
// app/models/Creature.php

class Creature {
    private $idCreature;
    private $name;
    private $description;
    private $avatar;
    private $attackPower;
    private $lifeLevel;
    private $weapon;

    // Constructor

    public function __construct($name = null, $description = null, $avatar = null, $attackPower = null, $lifeLevel = null, $weapon = null) {
        $this->name = $name;
        $this->description = $description;
        $this->avatar = $avatar;
        $this->attackPower = $attackPower;
        $this->lifeLevel = $lifeLevel;
        $this->weapon = $weapon;
    }

    // Getters y setters
    public function getIdCreature() {
        return $this->idCreature;
    }

    public function setIdCreature($idCreature) {
        $this->idCreature = $idCreature;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function getAttackPower() {
        return $this->attackPower;
    }

    public function setAttackPower($attackPower) {
        $this->attackPower = $attackPower;
    }

    public function getLifeLevel() {
        return $this->lifeLevel;
    }

    public function setLifeLevel($lifeLevel) {
        $this->lifeLevel = $lifeLevel;
    }

    public function getWeapon() {
        return $this->weapon;
    }

    public function setWeapon($weapon) {
        $this->weapon = $weapon;
    }
}
