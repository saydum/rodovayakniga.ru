<div class="row justify-content-center">
    <div class="col-4 text-center">
        <button id="showBtn" class="btn btn-outline-success rounded-5 fs-5 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="bi bi-arrow-down-circle"></i>
        </button>
        <div id="block" class="card-body py-2 text-start">
            <strong>Халибеков Сайдум Гамзубекович</strong>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A architecto aspernatur autem doloribus eos eum facere, incidunt inventore laboriosam maxime necessitatibus nulla possimus quod ratione repudiandae tempora temporibus, voluptatum? Distinctio.

            <hr>

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Добавление Родителя</h3>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Отец или Мать">
                                <option value="1">Отец</option>
                                <option value="2">Мать</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="text" placeholder="Имя">
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="file" placeholder="Фото">
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-outline-success">Добавить</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.getElementById('showBtn').addEventListener('click', () => {
        const block = document.getElementById('block');
        block.style.display = block.style.display === 'none' ? 'block' : 'none';
    });
</script>
