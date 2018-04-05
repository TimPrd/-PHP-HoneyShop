<?php
class UserManager {
	private  $db ;


	public function __construct($db1) {
		$this->db = $db1;
	}


	
        public function login($email, $password) {
        $email = htmlspecialchars($email);
        
        $req = $this->db->prepare(
	    'SELECT *
        FROM users
        WHERE email=:email AND password=:password'
	    );
        $req->execute(
            array(
                'email' => $email,
                'password' => $password,
            )
        );
        $user = $req->fetch(); //get the first user
        return $user;
    }


    public function create(User $user)
    {
        $req = $this->db->prepare(
	    'INSERT INTO users ( lastName, firstName, email, address, postalCode, city, password, country,admin)
	    VALUES ( :lastName, :firstName, :email, :address, :cp, :city, :password, :country,0)'
	    );

	    $req->execute(
			array(
				'lastName' => $user->getLastName(),
				'firstName' => $user->getFirstName(),
				'email' => $user->getEmail(),
				'address' => $user->getAdress(),
				'cp' => $user->getPostalCode(),
				'city' => $user->getCity(),
				'password' => $user->getPassword(),
                 'country' => $user->getCountry()
			)
		);
        echo 'L\'utilisateur a bien été ajouté !';

	}
        
        public function createByEmail()
        {
            $req = $this->db->prepare(
			'SELECT * FROM users where email=:email');
		$req->execute();

		return $req->fetchAll();

        }
        public function findAll() {
		$req = $this->db->prepare(
			'SELECT * FROM users');
		$req->execute();

		return $req->fetchAll();
	}

    public function findByEmail($email) {
        $req = $this->db->prepare(
        'select *
        FROM users
        WHERE email=:email');
        $req->execute(
            array(
                'email' => $email,
            )
        );
        $user = $req->fetch(); 
        return $user;
    }

    public function isAdmin($email){
        $user = $this->findByEmail($email);
        return $user['admin'];
    }

	public final  function findOne($id) {
		$req = $this->db->prepare(
	    'SELECT * FROM users where id = :id ');
		$req->execute();
		return $req->fetch(array(
				'id' => $user->getId()));
	}

	public final  function update(User $user) {
		$sql = "UPDATE users SET password='?', email='?', firstName='?', lastName='?', address='?', city='?',postalCode='?', country='?' WHERE id='?'";
		$req = $this->db->prepare($sql);
		$d = array($_POST['password'],$_POST['email'],$_POST['firstName'],$_POST['lastName'],$_POST['address'],$_POST['city'],$_POST['postalCode'],$_POST['country'], $_POST['id']);      
		$req->execute($d);
	}

	public final  function delete(User $user) {
		$sql = 'Delete from users where id ='. $user->getId();
		$req = $this->db->prepare($sql);
		$req->execute($req);
	}
}


?>