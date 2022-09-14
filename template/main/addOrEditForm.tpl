<div class="form-container">
    <form action="#" method="POST" class="form-car">
        <h3 class="form-title">Add new car</h3>
        <hr>
        <label>
            <select name="brand" id="select-brand">
                <option value="">brand</option>
            </select>
        </label>
        <label>
            <select name="year" id="select-year">
                <option value="">year</option>
                {foreach range(1985, date("Y")) as $year }
                    <option value={$year}>{$year}</option>
                {/foreach}
            </select>
        </label>
        <label>
            <select name="color" id="select-color">
                <option value="">color</option>
            </select>
        </label>
        <label>
            <select name="motor" id="select-motor">
                <option value="">motor</option>
                {foreach range(8, 50) as $item }
                    <option value={$item/10}>{$item/10}</option>
                {/foreach}
            </select>
        </label>
        <label>
            <input type="hidden" name="id" value='' id="select-id">
        </label>
        <div class="btn-container">
            <input type="submit" value="add" name="action" class="save-btn">
            <input type="submit" value="cancel" name="action" class="cancel-btn">
        </div>
    </form>
</div>
