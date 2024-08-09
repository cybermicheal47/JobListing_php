<?php

namespace Framework; // Declares the namespace 'Framework' to avoid naming conflicts

class Validation {

    // Method to validate a string with optional minimum and maximum length constraints
    public static function string($value, $min = 1, $max = INF) {
        if (is_string($value)) { // Check if the value is a string
            $value = trim($value); // Remove whitespace from the beginning and end of the string
            $length = strlen($value); // Get the length of the string
            return $length >= $min && $length <= $max; // Check if the length is within the specified range
        }
        return false; // Return false if the value is not a string
    }

    // Method to validate if a value is a valid email address
    public static function email($value) {
        $value = trim($value); // Remove whitespace from the beginning and end of the email
        return filter_var($value, FILTER_VALIDATE_EMAIL); // Use filter_var to validate the email format
    }

    // Method to check if two values match (case-sensitive)
    public static function match($value1, $value2) {
        $value1 = trim($value1); // Trim whitespace from the first value
        $value2 = trim($value2); // Trim whitespace from the second value
        return $value1 === $value2; // Return true if both trimmed values are identical, otherwise false
    }
}
