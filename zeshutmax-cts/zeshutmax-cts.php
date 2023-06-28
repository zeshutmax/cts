<?php

/**
 * Plugin Name:       Zeshutmax CTS
 * Author:            Max Zeshut
 */

/**
 *  If this file is called directly, abort.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Employee class.
 */

class Employee
{

    public string $name;
    public string $position;
    public float $salary;

    public function __construct($name, $position, $salary)
    {
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_position()
    {
        return $this->position;
    }

    public function get_salary()
    {
        return $this->salary;
    }

    public function get_employee_info()
    {
        return "{$this->name} ({$this->position}) has the following salary: {$this->salary}.";
    }
}

/**
 * Define Company class.
 */

class Company
{

    protected array $employees;

    public function __construct()
    {
        $this->employees = [];
    }

    public function add_employee($employee)
    {
        $this->employees[] = $employee;
    }

    public function get_employees()
    {
        return $this->employees;
    }

    public function get_employee_count()
    {
        return count($this->get_employees());
    }

    public function get_average_salary()
    {
        if ($this->get_employee_count() === 0) {
            return 0;
        }

        $overall_salary = 0;
        foreach ($this->get_employees() as $e) {
            $overall_salary += $e->get_salary();
        }

        return round($overall_salary / $this->get_employee_count(), 2);
    }
}
