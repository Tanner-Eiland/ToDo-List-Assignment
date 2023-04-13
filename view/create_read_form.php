<?php include('view/header.php'); ?>

<section>

                <?php if ($results) { ?>
                <section>
                    <h1></h1>
                </section>
                <?php
                foreach ($results as $result) {
                    $ItemNum = $result["ItemNum"];
                    $Title = $result["Title"];
                    $Description = $result["Description"];
                ?>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="ItemNum" value="<?= $ItemNum ?>">

                        <label for="<?= $Title ?>">Title:</label>
                        <input type="text" name="Title" value="<?= $Title ?>">

                        <label for="<?= $Description ?>">Description:</label>
                        <input type="text" name="Description" value="<?= $Description ?>">

                        
                        <button>Delete</button>
                    </form>
                <?php } ?>
            <?php } else { ?>
                <p>Sorry No Results!</p>
            <?php } ?>
            

            </section>
            <section>
                <h2>Add Item</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="hidden" name="action" value="insert">
                    <label for="Title">Title:</label>
                    <input type="text" id="Title" name="Title" required>
                    <label for="Description">Description:</label>
                    <input type="text" id="Description" name="Description" required>
                    <button>Add new item</button>
                </form>
            </section>
           
            <br>
<?php include('view/footer.php');?>