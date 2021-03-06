<?php

namespace app\core;


class Validation
{
    private $password;
    // private $errors = []
    // checks if server request is post
    // @return boolean
 
    // check if every array value is empty
    // @return boolean
    public function ifEmptyArr($arr)
    {
        // check if all values of array is empty
        foreach ($arr as $errorValue) {
            if (!empty($errorValue)) {
                return false;
            }
        }
        return true;
    }
    /**
     * validates empty field
     *
     * @param array $data
     * @param string $field
     * @param string $fieldDisplayName
     * @return void
     */
    public function ifEmptyFieldWithReference(&$data, $field, $fieldDisplayName)
    {
        $fieldError = $field . 'Err';
        // Validate Name 
        if (empty($data[$field])) {
            // empty field
            $data['errors'][$fieldError] = "Please enter Your $fieldDisplayName";
        }
    }
    /**
     * checks if given string is empty returns message if empty.
     *
     * @param string $field
     * @param string $msg
     * @return string
     */
    public function validateEmpty($field, $msg)
    {
        return empty($field) ? $msg : '';
    }

    
    /**
     * if field is empty we return message, else we return empty string
     *
     * @param string $field
     * @return string
     */
    public function validateName($field, $min, $max)
    {
        // Validate Name 
        if (empty($field)) return "Please enter your Name";

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return "Name must only contain Name characters";

        // if pass length is les then min
        if (strlen($field) < $min) return "Name must be more than $min characters length";

        // if pass length is more then max
        if (strlen($field) > $max) return "Name must be less than $max characters length";

        return ''; //falsy
    }

    public function validateEmail($field, &$userModel = null)
    {
        // validate empty 
        if (empty($field)) return "Please enter Your Email";

        // check email format
        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) return "Please check your email";

        if ($userModel !== null):
        // if email already exists
        if ($userModel->findUserByEmail($field)) return 'Email already taken';
        endif;
        
        return '';
    }

    public function validateLoginEmail($field, &$userModel)
    {
        // validate empty 
        if (empty($field)) return "Please enter Your Email";

        // check email format
        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) return "Please check your email";

        // if email already exists
        if (!$userModel->findUserByEmail($field)) return 'Email not found';

        return '';
    }

    public function validatePassword($passField, $min, $max)
    {
        // validate empty 
        if (empty($passField)) return "Please enter a password";

        // save password for later
        $this->password = $passField;

        // if pass length is les then min
        if (strlen($passField) < $min) return "Password must be more than $min characters length";

        // if pass length is more then max
        if (strlen($passField) > $max) return "Password must be less than $max characters length";

        // check password strength
        if (!preg_match("#[0-9]+#", $passField)) return "Password must contain at least one number";

        if (!preg_match("#[a-z]+#", $passField)) return "Password must include at least one letter!";

        return '';
    }

    public function validatePasswordConfirm($field)
    {
        // validate empty 
        if (empty($field)) return "Please repeat a password";

        if (!$this->password) return 'no password saved';

        if ($field !== $this->password) return "Password must match";

        return '';
    }

    public function validatePhone($number)
    {
        if (!preg_match("/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/", $number)) return "Invalid contact number";
        
    }

    public function validateAddress($field, $max)
    {
        // if pass length is more then max
        if (strlen($field) > $max) return "Address must be less than $max characters length";

        return ''; //falsy
    }

    public function validateSurname($field, $min, $max)
    {
        // Validate Name 
        if (empty($field)) return "Please enter your Surname";

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return "Surname must only contain Surname characters";

        // if pass length is les then min
        if (strlen($field) < $min) return "Surname must be more than $min characters length";

        // if pass length is more then max
        if (strlen($field) > $max) return "Surname must be less than $max characters length";

        return ''; //falsy
    }

    public function validateFeedback($field, $max)
    {
        // Validate Feedback 
        if (empty($field)) return "Please fill out the field";

        // if pass length is more then max
        if (strlen($field) > $max) return "Must be less than $max characters length";

        return ''; //falsy
    }

}