<div style="font-family: Sans-Serif; font-size: larger">
    {{ trans_choice('{0} no like|{1} :count like|[2,*] :count likes',
    count($model->likes), ['count' => count($model->likes)]) }}
</div>
