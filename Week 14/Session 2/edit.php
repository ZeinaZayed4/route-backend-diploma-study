<?php

include_once 'inc/header.php';

if ($request->check($request->get('id'))) {
	$id = $request->get('id');
 
    $result = $conn->prepare('SELECT * FROM `todo` WHERE `id` = ?');
    $result->execute([$id]);
    
    if ($result->rowCount() === 1) {
		$todo = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        $session->set('errors', ['Task not found']);
        $request->redirect('index.php');
    }
}

?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php require_once 'inc/status.php' ?>
                <form action="handle/edit.php?id=<?= $todo['id'] ?>" method="post">
                    <div class="mb-3">
                        <textarea class="form-control" rows="3" name="title"><?= $todo['title'] ?></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once 'inc/footer.php' ?>
