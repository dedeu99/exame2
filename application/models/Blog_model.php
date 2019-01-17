<?php class Blog_model extends CI_Model {

	public function __construct()
	{
		  $this->load->database();
	}


	public function register_user()
	{
	
		$pass1_utilizador = $this->input->post('pass1_utilizador');	
		/*md5('$pass') -> encripta a password*/
		
		$seed = substr(time(),-4);
        $passe = substr($seed . md5($seed. $_POST['pass1_utilizador']),0,32);
		
		/*Guarda os dados do Cliente*/
		$present_date = date("Y-m-d H:i:s");
		$query = "INSERT INTO users (password_digest,name,email, created_at, updated_at)
					VALUES('" .$passe. "','" . $this->input->post('apelido_utilizador') . "','" . $this->input->post('email') . "','" . $present_date . "','" . $present_date . "')";
		return $this->db->query($query);
																																						}
																																						public function validate_user()	
																																						{
		$query  = "SELECT * FROM users
                            WHERE email = '" . $_POST['username_login'] . "'";
		$result = $this->db->query($query);
		$tupple = $result->row();
		
		if (isset($tupple))
		{
			$seed = substr($tupple -> password_digest, 0, 4);
			$hash = substr($seed . md5($seed. $_POST['pass_utilizador']),0,32);
			
			if ($hash == $tupple -> password_digest) {
				return $tupple;
			}
			else {
				return NULL;
			}
		}
		else {
			return NULL;
		}
	}
	
	public function validate_email()	
																																						{
		$query  = "SELECT * FROM users
						   WHERE email = '" . $_POST['username_login'] . "'";												
		$result = $this->db->query($query);
		return $result->row();
	}
	
	
	
	public function get_blog($blog_id)
	{
		$query = "SELECT * FROM microposts  WHERE id ='" . $blog_id . "'";
		$result = $this->db->query($query);
		return $result->row();
	}
	
//PONHA O SEU CODIGO ABAIXO DESTA LINHA
																																						

	public function get_friends($user_id)
	{

			
			$query = $this->db->query("SELECT name,email,friend_user_id FROM users INNER JOIN friends ON (friends.friend_user_id=users.id) WHERE friends.user_id='$user_id'");



			return $query->result_array();
			

	}
	public function get_users($user_id)
	{

			
			/*********************************************************/
			/*                  QUERY DA PERGUNTA 1                  */
			/*********************************************************/

			/*$query = $this->db->query("select * from users where id !='$user_id'");*/
			






			$query = $this->db->query("select * from users where id !='$user_id' and id NOT IN (
										SELECT friend_user_id FROM friends WHERE user_id='$user_id'
									)
			");
			return $query->result_array();
			

	}

	public function makefriend($user_id,$friend_id){

		//caso já sejam amigos não deverá ser possivel adicionar uma amizade novamente
		if($this->db->query("SELECT user_id FROM friends WHERE user_id='$user_id' AND friend_user_id='$friend_id'")->num_rows()==0)
			$this->db->query("INSERT INTO friends (user_id, friend_user_id, created_at) VALUES ('$user_id','$friend_id',NOW())");
		
	}
	public function unfriend($user_id,$friend_id){
		$this->db->query("DELETE FROM friends WHERE user_id='$user_id' AND friend_user_id = '$friend_id'");
	}
	public function new_blog()
	{
		$present_date = date("Y-m-d H:i:s");
		$mysql_query = "INSERT INTO microposts (user_id, content,created_at, updated_at,public)
					VALUES('" . $_SESSION['id'] . "','" . $_POST['blog'] . "','" . $present_date . "','". $present_date . "','". $_POST['visibility'] . "')"  ;
		return $this->db->query($mysql_query);
	}
	
	public function update_blog($blog_id)
	{
		$present_date = date("Y-m-d H:i:s");	
		$mysql_query = "UPDATE microposts SET content='" . $_POST['blog'] . "' , updated_at='" . $present_date . "' , public='" . $_POST['visibility'] .  "'WHERE id='" . $blog_id . "'" ;
		return $this->db->query($mysql_query);
	}
	

	public function get_public_posts()
	{

			
			$query = $this->db->query("SELECT u.name, m.id, m.user_id, m.content, m.created_at, m.updated_at, m.likes,m.public from users as u inner join (microposts as m) on (u.id=m.user_id) where public='1' order by m.updated_at desc");
			return $query->result_array();
			

	}

	public function get_public_and_private_posts()
	{

			/****************************************************************************************************************/
			/* DE ACORDO COM O ENUNCIADO: 																					*/
			/* os posts de distribuição restrita gerados pelo proprio utilizador não são visiveis na lista, a menos que o 	*/
			/* utilizador se faça amigo de si próprio... 																	*/
			/****************************************************************************************************************/

			$query = $this->db->query("SELECT u.name, m.id, m.user_id, m.content, m.created_at, m.updated_at, m.likes,m.public from users as u inner join (microposts as m) on (u.id=m.user_id) where public='1' OR (public='0' AND u.id IN (
				SELECT user_id FROM friends WHERE friend_user_id='".$_SESSION['id']."'
			)) order by m.updated_at desc");



			/****************************************************************************************************************/
			/*A solução seguinte também permite ao seu utilizador editar e/ou mudar a visibilidade dos seus posts    APÓS	*/
			/*colocar os respectivos como privados... Foi a minha primeira implementação até rever o enunciado no final...	*/
			/****************************************************************************************************************/

			/*
			$query = $this->db->query("SELECT u.name, m.id, m.user_id, m.content, m.created_at, m.updated_at, m.likes,m.public from users as u inner join (microposts as m) on (u.id=m.user_id) where m.user_id='".$_SESSION['id']."' OR public='1' OR (public='0' AND u.id IN (
				SELECT user_id FROM friends WHERE friend_user_id='".$_SESSION['id']."'
			)) order by m.updated_at desc");
			*/

			return $query->result_array();
	}
}
