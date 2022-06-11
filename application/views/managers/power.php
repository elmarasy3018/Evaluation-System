<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <br><br>
                <table class="table table-light table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID no.</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($managers as $post) : ?>
                            <tr class="alert" role="alert">
                                <td><?= $post['id'] ?></th>
                                <td><?= $post['name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <br>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Managers
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php foreach ($managers as $post) : ?>
                <a class="dropdown-item" href="managers/<?= $post['id'] ?>"><?= $post['name'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>