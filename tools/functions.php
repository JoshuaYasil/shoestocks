<?php

function validate_first_name($POST){
    if(!isset($POST['fn'])){
        return false;
    }else if(strlen(trim($POST['fn']))<1){
        return false;
    }
    return true;
}

function validate_last_name($POST){
    if(!isset($POST['ln'])){
        return false;
    }else if(strlen(trim($POST['ln']))<1){
        return false;
    }
    return true;
}

function validate_email($POST){
    // Remove all illegal characters from email
    $email = filter_var($POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Separate string by @ characters (there should be only one)
        $parts = explode('@', $email);

        // Remove and return the last part, which should be the domain
        $domain = array_pop($parts);

        // Check if the domain is WMSU
        if (strcmp(strtolower($domain), 'wmsu.edu.ph') != 0)
        {
            return false;
        }
    } else {
        return false;
    }
    return true;
}

function validate_position($POST){
    if(!isset($POST['position'])){
        return false;
    }else if(strcmp($POST['position'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_company_name($POST){
    if(!isset($POST['company_name'])){
        return false;
    }else if(strcmp($POST['company_name'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_company_address($POST){
    if(!isset($POST['company_address'])){
        return false;
    }
    return true;
}

function validate_add_supplier($POST){
    if(!validate_first_name($POST) || !validate_last_name($POST) || !validate_email($POST) ||
     !validate_position($POST) || !validate_company_name($POST) || !validate_company_address($POST)){
        return false;
     }
    return true;
}

function validate_program_code($POST){
    if(!isset($POST['code'])){
        return false;
    }else if(strlen(trim($POST['code']))<1){
        return false;
    }
    return true;
}

function validate_program_code_duplicate($POST){
    if(!isset($POST['code'])){
        return false;
    }
    elseif(isset($POST['old-code'])){
        if(strcmp(strtolower($POST['code']), strtolower($POST['old-code'])) == 0){
            return true;
        }else{
            $program = new Program();
            foreach ($program->show() as $value){
                if(strcmp(strtolower($value['code']), strtolower($POST['code'])) == 0){
                    return false;
                }
            }
        }
    }else{
        $program = new Program();
        foreach ($program->show() as $value){
            if(strcmp(strtolower($value['code']), strtolower($POST['code'])) == 0){
                return false;
            }
        }
    }
    return true;
}

function validate_program_desc($POST){
    if(!isset($POST['description'])){
        return false;
    }else if(strlen(trim($POST['description']))<1){
        return false;
    }
    return true;
}

function validate_level($POST){
    if(!isset($POST['level'])){
        return false;
    }else if(strcmp($POST['level'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_cet($POST){
    if(!isset($POST['cet'])){
        return false;
    }else if($POST['cet'] < 55){
        return false;
    }
    return true;
}

function validate_status($POST){
    if(!isset($POST['status'])){
        return false;
    }
    return true;
}

function validate_add_program($POST){
    if(!validate_program_code($POST) || !validate_program_desc($POST) || !validate_cet($POST) ||
     !validate_level($POST) || !validate_status($POST) || !validate_program_code_duplicate($POST)){
        return false;
     }
    return true;
}

?>