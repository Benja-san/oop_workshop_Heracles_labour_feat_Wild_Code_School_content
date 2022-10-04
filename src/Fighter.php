<?php

/* Fighter class definition */
class Fighter
{

    //Constants
    public const MAX_LIFE = 100;

    //Properties
    private string $name;
    private int $dexterity;
    private int $strength;
    private int $life = self::MAX_LIFE;

    //Magic methods
    public function __construct(string $name, int $dexterity, int $strength){
        $this->name = $name;
        $this->dexterity = $dexterity;
        $this->strength = $strength;
    }

    //Getter and Setter Methods
    public function getName(): string
    {
        return $this->name;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function setDexterity(int $dexterity): void
    {
        $this->dexterity = $dexterity;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function getLife(): int
    {
        return $this->life;
    }

    public function setLife(int $life): void
    {
        $this->life = $life;
    }

    //Logical methods
    public function fight(Fighter $defender) : int
    {
        $attackPower = rand(1, $this->strength);
        $defenderDamage = $attackPower - $defender->getDexterity();
        $inflictedDamages = $defenderDamage <= 0 ? 0 : $defenderDamage;
        $defenderLifePoints = $defender->getLife();
        $lifeRemaining = ($defenderLifePoints - $inflictedDamages) <= 0 ? 0 : $defenderLifePoints - $inflictedDamages;
        $defender->setLife($lifeRemaining);
        return $inflictedDamages;
    }
}