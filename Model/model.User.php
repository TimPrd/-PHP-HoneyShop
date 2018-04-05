<?php
class User {
	private  $id;
	private  $email;
	private  $password;
	private  $firstName;
	private  $lastName;
	private  $address;
	private  $postalCode;
	private  $city;
	private  $country;


	public function __construct($email, $password, $firstName, $lastName, $address,$city,$postalCode,$country ) {
        $data = array(
        'password' => $password,
        'email' => $email,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'address' => $address,
        'postalcode' => $postalCode,
        'city' => $city,
        'country' => $country
         );
        
        $this->hydrate($data);
	}

    public function hydrate(array $data){
		foreach($data as $key => $value){
            $this->{'set'.ucwords($key)}($value);
        }
    }


	public  function setId($id) {
        $this->id = $id;
	}

    public  function getId() {
       return $this->id;
    }

    public  function getPassword() {
        return $this->password;
    }

    public  function setPassword($password) {
        $this->password = $password;
    }

    public  function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email=$email;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Cette adresse email est considérée comme non valide.";
        }
	}

    public  function getEmail() { 
		return $this->email;
	}

    public function setFirstName($firstName)
    {
        //if (preg_match("#^[a-Z]{2,45}$#"))
            $this->firstName =  $firstName;        
    }

    public function getFirstName()
    {
           return $this->firstName;
    }

    public function setLastName($lastName)
    {
        //if (preg_match("#^[a-Z]{2,45}$#"))
            $this->lastName = $lastName;
    }

    public function getLastName()
    {
           return $this->lastName;
    }

    public function setAddress($address)
    {
        //if (preg_match("#^[a-Z]{2,45}$#"))
           $this->address = $address;
    }

    public function getAdress()
    {
           return $this->address;
    }

     public function setPostalCode($postalCode)
    {
        //if (preg_match("#^[0-9]{0,5}$#"))
            $this->postalCode = $postalCode;
    }

    public function getPostalCode()
    {
           return $this->postalCode ;
    }


    public function setCity($city)
    {
       // if (preg_match("#^[a-Z]{2,45}$#"))
            $this->city = $city;
    }

    public function getCity()
    {
           return $this->city;
    }


    public function setCountry($country)
    {
        //if (preg_match("#^[a-Z]{2,45}$#"))
            $this->country = $country;
    }

    public function getCountry()
    {
           return $this->country;
    }

    public function getAdmin()
    {
           return $this->admin;
    }

   














}
?>