<?php

// Create a user login page that allows
//the end user to access a list of clients 
//by id and name.
require_once(SRC_PATH.DIRECTORY_SEPARATOR."Connection.php");

if(isset($_GET['type']) && isset($_GET['value'])) {
	$type = filter_var($_GET['type'], FILTER_SANITIZE_STRING);
	$value = filter_var($_GET['value'], FILTER_SANITIZE_STRING);

	//run query
	$clients = $dbConnection->clearIfNeeded()
													->search('clients')
													->where($type, $value)
													->get();
}
?>

<h1> Search the Client Directory</h1>

<form class="form-inline" method="GET" action="#" id="client-search-form">

  <div class="input-group mb-2 mr-sm-2">
    <select class="form-control" name="type" id="client-option-select">
			<option value="id" <?php echo (isset($_GET['type']) && $_GET['type'] == 'id') ? 'selected' : ''?> >ID</option>
			<option value="firstname" <?php echo (isset($_GET['type']) && $_GET['type'] == 'firstname') ? 'selected' : ''?> >First Name</option>
			<option value="lastname" <?php echo (isset($_GET['type']) && $_GET['type'] == 'lastname') ? 'selected' : ''?> >Last Name</option>
		</select>
	</div>
	
	<input type="text" name="value" class="form-control mb-2 mr-sm-2" id="client-search-term" placeholder="Search Term" value=<?php echo (isset($_GET['value'])) ? $_GET['value'] : '' ?> >

  <button type="submit" class="btn btn-primary mb-2">Search Directory</button>
</form>

<table class="table" id="result-client-list">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Company</th>
			<th scope="col">Phone</th>
      <th scope="col">Email</th>			
    </tr>
  </thead>
  <tbody>
		<?php if(isset($clients)): ?>
			<?php foreach($clients as $client): ?>
    		<tr>
					<td><?php echo $client['id'] ?></td>
					<td><?php echo ucwords($client['firstname']) ?></td>
					<td><?php echo ucwords($client['lastname']) ?></td>
					<td><?php echo $client['company']?></td>
					<td><?php echo $client['phone']?></td>
					<td><?php echo $client['email']?></td>
				</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td id="client-placeholder" colspan=6>Search to Show Results</td>
				</tr>
			<?php endif; ?>
    </tr>
  </tbody>
</table>

