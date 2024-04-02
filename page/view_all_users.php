<?php
include_once "../components/navbar_admin.php";
require_once "../includes/config_session.inc.php";
require_once "../includes/db.inc.php";
require_once "../includes/mvc_view_all_users/view_all_users_model.inc.php";
require_once "../includes/mvc_delete_account/delete_account_view.inc.php";
require_once "../includes/mvc_edit_user/edit_user_view.inc.php";




if (empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "admin") {
    header("Location: ./login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HospiLite</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/login_register.css">
</head>

<body>
    <main>
        <h2>HospiLite - View All Users</h2>
        <div>
            <form action="./add_user.php">
                <button class="btn-submit">Add User</button>
            </form>
            <div class="wrapper">
                <p>Note: You're also included in the table, here you can update other informations like user name, DOB and etc.</p>
                <table>
                    <caption>Users Details</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>E-mail</th>
                            <th>Phone No.</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Operations</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $results = viewUsers($pdo);
                        if ($results) {
                            foreach ($results as $result) {
                                echo '
                                <tr>
                                    <td data-cell="ID">' . $result["id"] . '</td>
                                    <td data-cell="Full Name">' . $result["fullname"] . '</td>
                                    <td data-cell="E-mail">' . $result["email"] . '</td>
                                    <td data-cell="Phone No.">' . $result["phone"] . '</td>
                                    <td data-cell="Date of Birth">' . $result["dob"] . '</td>
                                    <td data-cell="Gender">' . $result["gender"] . '</td>
                                    <td data-cell="Role">' . $result["user_role"] . '</td>
                                    <td data-cell="created At">' . $result["created_at"] . '</td>
                                    <td data-cell="Operations"> <a class="link-btn" href="edit_user.php?id='.$result["id"].'">Edit</a> <a class="link-btn link-btn-red" href="./delete_user.php?id='.$result["id"].'">Delete</a> </td>

                                </tr>
                                ';
                                

                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
                check_acc_del_errors();
                check_edit_user_errors()
                ?>
    </main>
</body>

</html>