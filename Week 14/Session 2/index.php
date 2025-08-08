<?php include_once 'inc/header.php'; ?>

    <div class="container">
        <h1 class="app-title">To Do</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php include_once 'inc/status.php' ?>
            </div>
        </div>
        
        <!-- Add Task Form -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="add-form">
                    <form action="handle/add.php" method="post">
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" name="title" placeholder="Enter your task..." ></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Add Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
        <!-- Task Columns -->
        <div class="row">
            <!-- All Notes Column -->
            <div class="col-md-4">
                <div class="todo-column">
                    <h4 class="column-header">All Tasks</h4>
    
                    <?php
                    $result = $conn->prepare("SELECT * FROM `todo` WHERE `status` = 'all'");
                    $result->execute();
                    $todos = $result->fetchAll(PDO::FETCH_ASSOC);
                    
                    if (count($todos) > 0): ?>
                        <?php foreach ($todos as $todo): ?>
                            <div class="todo-item">
                                <div class="todo-title"><?= $todo['title'] ?></div>
                                <div class="todo-date"><?= $todo['created_at'] ?></div>
                                <div class="btn-group">
                                    <a href="edit.php?id=<?= $todo['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="handle/update_status.php?status=doing&id=<?= $todo['id'] ?>" class="btn btn-info btn-sm">Start</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div>No tasks yet</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    
            <!-- Doing Column -->
            <div class="col-md-4">
                <div class="todo-column">
                    <h4 class="column-header">In Progress</h4>
					
					<?php
					$result = $conn->prepare("SELECT * FROM `todo` WHERE `status` = 'doing'");
					$result->execute();
					$todos = $result->fetchAll(PDO::FETCH_ASSOC);
					
					if (count($todos) > 0): ?>
                        <?php foreach ($todos as $todo): ?>
                            <div class="todo-item doing">
                                <div class="todo-title"><?= $todo['title'] ?></div>
                                <div class="todo-date"><?= $todo['created_at'] ?></div>
                                <div class="btn-group">
                                    <span></span>
                                    <a href="handle/update_status.php?status=done&id=<?= $todo['id'] ?>" class="btn btn-success btn-sm">Complete</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div>No tasks yet</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    
            <!-- Done Column -->
            <div class="col-md-4">
                <div class="todo-column">
                    <h4 class="column-header">Completed</h4>
					
					<?php
					$result = $conn->prepare("SELECT * FROM `todo` WHERE `status` = 'done'");
					$result->execute();
					$todos = $result->fetchAll(PDO::FETCH_ASSOC);
					
					if (count($todos) > 0): ?>
                        <?php foreach ($todos as $todo): ?>
                            <div class="todo-item done">
                                <a href="handle/delete.php?id=<?= $todo['id'] ?>" class="remove-btn" onclick="return confirm('Are you sure?')">×</a>
                                <div class="todo-title"><?= $todo['title'] ?></div>
                                <div class="todo-date"><?= $todo['created_at'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <div>No tasks yet</div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'inc/footer.php' ?>
