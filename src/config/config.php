<?php
return array(
    'templates' => array(
        'default' => '<div class="form-group {{error-has}}">
                    {{label}}
                    <div class="controls col-sm-5">
                        {{tag}}
                        {{error-first}}
                    </div>
                </div>',
        'default2' => '<div class="form-group">
                    {{label}}
                    {{test}}
                    <div class="controls col-sm-5">
                        {{tag}}
                    </div>
                </div>',
        'search' => "<li>
                    <div class='form-group fix-width' >
                        {{label}}
                        {{tag}}
                    </div>
                </li>",
        'tags' => array('{{test}}' => 'default_value'),
    ),
);