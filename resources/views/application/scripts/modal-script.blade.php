<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.show-human-info').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();

                const content = document.getElementById('humanInfoContent');
                const name = link.dataset.name ?? '';
                const lastName = link.dataset.lastname ?? '';
                const surname = link.dataset.surname ?? '';
                const gender = link.dataset.gender ?? '';
                const image = link.dataset.image ?? '';
                const fatherLink = link.dataset.father ?? '#';
                const motherLink = link.dataset.mother ?? '#';

                content.innerHTML = `
                    <div class="text-center">
                        <img src="${image}" class="img-fluid rounded mb-2" style="max-height: 200px; border-radius: 12px;">
                        <h5>${name} ${lastName} ${surname}</h5>
                        <p>Пол: ${gender === 'male' ? 'Мужской' : gender === 'female' ? 'Женский' : 'Не указан'}</p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="${fatherLink}" class="btn btn-outline-primary">Добавить отца</a>
                            <a href="${motherLink}" class="btn btn-outline-secondary">Добавить мать</a>
                        </div>
                    </div>
                `;
            });
        });
    });
</script>
