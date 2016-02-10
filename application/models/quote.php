<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Model
{
  public function add($post)
  {
    $query = "INSERT INTO quotes (quote, quoted_by, posted_by) VALUES (?,?,?)";
    $values = array($post['message'], $post['quoted_by'], $this->session->userdata('first_name'));
    $quote_id = $this->db->insert_id($this->db->query($query, $values));
    return $quote_id;
  }


  public function fetch_quotes($user_id)
  {
    //get all quotes (except favorites)
    // $query = "SELECT * FROM quotes";
    $query = "SELECT * FROM quotes WHERE id NOT IN (SELECT quotes_id FROM favorites WHERE users_id = ?)";
    return $this->db->query($query, $user_id)->result_array();
  }

  public function fetch_favorites($user_id)
  {
    //get all from favorites table where users.id = $this->session->userdata('id')
    $query = "SELECT users.id, first_name, quotes.id, quotes.quote, quotes.quoted_by, quotes.posted_by FROM users
              JOIN favorites ON users.id = favorites.users_id
              JOIN quotes ON favorites.quotes_id = quotes.id WHERE users.id = ?";
    return $this->db->query($query, array($user_id))->result_array();
  }

  public function remove($user_id, $quote_id)
  {
    $this->db->query("DELETE FROM favorites WHERE favorites.users_id = ? AND favorites.quotes_id = ?", array($user_id, $quote_id));
  }

  public function add_favorite($user_id, $quote_id)
  {
    $query = "INSERT INTO favorites (users_id, quotes_id) VALUES (?,?)";
    $values = array($user_id, $quote_id);
    $this->db->query($query, $values);
  }
}
