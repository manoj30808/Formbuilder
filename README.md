# Formbuilder for Laravel5

    Step 1 : "require": {
				"sonlabs/formbuilder" : "dev-master"
			},
    Step 2 : Add service provider in config/app.php 
            'providers'=>['SonLabs\FormBuilder\FormBuilderServiceProvider',]
    Step 3 : Add aliases in config/app.php 
            'aliases'=>['Formbuilder'=>'SonLabs\FormBuilder\Facades\Formbuilder']
    Step 4 : create formbuilder.php under config folder with this code
# ------formbuilder.php-----
```php
    <?php
    return array(
    'templates' => array(
        'default' => '<div class="form-group col-sm-12 {!! error-has !!}">
                    {!! label !!}
                    <div class="controls col-sm-10">
                        {!! tag !!}
                        {!! error-first !!}
                    </div>
                </div>',
        'default2' => '<div class="form-group">
                    {!! label !!}
                    {!! test !!}
                    <div class="controls col-sm-5">
                        {!! tag !!}
                    </div>
                </div>',
        'search' => "<li>
                    <div class='form-group fix-width' >
                        {!! label !!}
                        {!! tag !!}
                    </div>
                </li>",
        'tags' => array('{!! test !!}' => 'default_value'),
    ),
);
```
# Example :
    {!! Formbuilder::text('name',null,array('class'=>'form-control'))->label('Name:',array('class'=>'col-sm-2 control-label'))->error($errors) !!}
    {!! Formbuilder::select('channel_id',$data['channels'],array('class'=>'form-control'))->label('Channels:',array('class'=>'col-sm-2 control-label'))->error($errors) !!}