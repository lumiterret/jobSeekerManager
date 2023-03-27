<div class="mb-3">
    <x-form-input name="title" label="Название вакансии"/>
</div><div class="mb-3">
    <x-form-textarea name="description" label="Описание вакансии" rows="10"/>
</div>
<div class="mb-3">
    <x-form-select
        name="emploer"
        :options="$employers"
        label="Компания"
    />
</div>
