function isStrongPassword(pass){
    //(2 points) The string is at least 8 characters long.
    if(pass.length < 8){
        console.log("False - Too Short")
        return false;
    }
    //(2 points)The string does not contain the substring "password" or "1234" 
    //-- (lowercase only, don't worry about "PASSWORD", "PaSsWoRd", etc). 
    //Hint: Use indexOf() to test for the substring.
    if(pass.includes("password") || pass.includes("1234")){
        console.log("False - Contains substring 'password' or '1234'");
        return false;
    }
    //(4 points)The password contains at least one digit. 
    //Hint: Call the string method charCodeAt(index) to get the Unicode value 
    //of each character in the password. If a character code is 
    //between 48 and 57 (the Unicode values for 0 and 9), then an digit character is found.
    {
    x = 0;
    for(let i = 0; i < pass.length; i++){
        if(pass.charCodeAt(i)>47 && pass.charCodeAt(i)<58){
            x = 1
            break;
        }
    }
    if(x == 0){
        console.log("False - No Numbers");
        return false;
    }
    }
    //(2 points) Otherwise, the function 
    //should console log the reason for rejecting the proposed password and return false. 
    console.log("True - Valid Password");
    return true;
}


isStrongPassword("qwerty1");
isStrongPassword("qwertypassword1");
isStrongPassword("qwertyABC");
isStrongPassword("qwety123");

