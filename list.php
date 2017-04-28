<?php
    include "header.php";

    //pregatesc sql

    $sql = "SELECT * FROM watches";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $watches = $stmt->fetchAll();

    //cand s-a facut updateul sau s-a adaugat produs nou sa se afiseze mesajul de ok
    if(isset($_SESSION["message"])){
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
?>

    <p>
        <a href="add_product_form.php">Add product</a>
    </p>

    <table>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Currency</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>

        <?php foreach($watches as $watch): ?>
        <tr>
            <td><?php echo $watch["id"]?></td>
            <td><?php echo $watch["brand"]?></td>
            <td><?php echo $watch["title"]?></td>
            <td><?php echo $watch["description"]?></td>
            <td><?php echo $watch["price"]?></td>
            <td><?php echo $watch["currency"]?></td>
            <td><?php echo $watch["stock"]?></td>
            <td>
                <a href="update_form.php?id=<?php echo $watch["id"]?>">Edit</a>
                <a href="delete.php?id=<?php echo $watch["id"]?>"
                    onclick="if (!window.confirm('Are you sure?')) return false;">
                    Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

</body>
</html>
