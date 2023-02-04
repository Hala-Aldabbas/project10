<?php include "parts/header.php"; ?>
        <div class="row align-items-center">
            <div class="col-md-9"><h2 class="text-capitalize p-3">all Contact</h2></div>
        </div>
        <div class="row">
            <table class="table text-center table-hover text-capitalize">
                <thead>
                    <tr>
                        <th>.no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>massage</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            $limit = 3;
            $page = (!empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page']:1;
            $offset = ($page - 1) * $limit;
            $result = mysqli_query($conn,"SELECT * FROM contact_us ORDER BY id DESC LIMIT $offset,$limit");
            if($err = mysqli_error($conn)){
                die($err);
            }else{
                if(mysqli_num_rows($result) > 0){
                    while($rows = mysqli_fetch_assoc($result)){
                        echo "<tr>
                        <td>{$rows['id']}</td>
                        <td>{$rows['name']} </td>
                        <td>{$rows['email']} </td>
                        <td>{$rows['subject']}</td>
                        <td>{$rows['msg']}</td> 
                        <td><a href='delete_contact.php?id={$rows['id']}' class='btn btn-danger text-capitalize'>delete</a></td>
                    </tr>";
                    }
                }else{
                    echo "<tr><td colspan='6'>no records found.</td></tr>";
                }
            }
       	 		 
                ?>
                </tbody>
            </table>
            
        </div>
    </div>
    <?php  include "parts/dash.php"; ?>

   