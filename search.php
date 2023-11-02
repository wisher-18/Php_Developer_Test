<?php
include "authentication.php";
include "dbcon.php";
$page_title = "View All Users";
include "includes/header.php"; ?>
<?php include "includes/navbar.php";

$usersPerPage = 10;

// Get the current page number from the URL
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1; // Default to the first page
}

// Calculate the offset for the query
$offset = ($currentPage - 1) * $usersPerPage;




?>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-success">
                        <h5><?php echo $_SESSION['status'] ?></h5>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Searched users</h4>
                        

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Username</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_POST['search'])){
                                    $search = $_POST['search'];
                                    
                                $query = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'
                                OR username LIKE '%$search%' LIMIT $offset, $usersPerPage";
                                $select_users = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_users)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $username = $row['username'];
                                    $address = $row['address'];
                                    $date = $row['created_at'];


                                    echo "<tr>";
                                    echo "<td>{$id}</td>";
                                    echo "<td>{$name}</td>";
                                    echo "<td>{$email}</td>";
                                    echo "<td>{$phone}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td>{$address}</td>";
                                    echo "<td>{$date}</td>";

                                    echo "<td><a href='edit_user.php?edit={$id}'>Edit</a></td>";
                                    echo "<td><a href='view_user.php?view={$id}'>View</a></td>";
                                    echo "<td><a href='view_all_users.php?delete={$id}'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                


                                ?>
                            </tbody>
                        </table>


                        <?php
                        // Count the total number of users
                        $totalUsersQuery = "SELECT COUNT(*) as total_users FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'
                        OR username LIKE '%$search%'";
                        $totalUsersResult = mysqli_query($connection, $totalUsersQuery);
                        $totalUsersRow = mysqli_fetch_assoc($totalUsersResult);
                        $totalUsers = $totalUsersRow['total_users'];

                        // Calculate the total number of pages
                        $totalPages = ceil($totalUsers / $usersPerPage);

                        // Output pagination links
                        echo "<ul class='pagination'>";
                        for ($page = 1; $page <= $totalPages; $page++) {
                            echo "<li class='page-item " . ($page == $currentPage ? 'active' : '') . "'>";
                            echo "<a class='page-link' href='view_all_users.php?page=$page'>$page</a>";
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                        ?>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['delete'])) {
    $id_del = $_GET['delete'];
    $query = "DELETE FROM users WHERE id = {$id_del} ";
    $delete_user_query = mysqli_query($connection, $query);
    header("Location: view_all_users.php");
}

?>



<?php include "includes/footer.php"; ?>