<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <br>
                <table class="table table-light table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID no.</th>
                            <th>Action</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($record as $post) : ?>
                            <tr class="alert" role="alert">
                                <th scope="row"><?= $post['id'] ?></th>
                                <td><?= $post['action'] ?></td>
                                <td><?= $post['time'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>