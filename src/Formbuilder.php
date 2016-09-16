<?php namespace SonLabs\FormBuilder;
use Form;
use HTML;
class Formbuilder
{
 
    private $config;
    private $template;
    private $tags = array(
        '{!! tag!!}' => '',
        '{!! tag_name !!}' => '',
        '{!! label !!}' => '',
        '{!! error-first !!}' => '',
        '{!! error-has !!}' => '',
        '{!! help-block !!}' => '',
    );
    public function __construct($config)
    {
        $this->config = $config;
        $this->template = $config['templates']['default'];
        $this->tags = array_merge($this->tags, $config['templates']['tags']);
    }
     public function setTemplate($name) {
        $this->template = $this->config['templates'][$name];
        return $this;
    }
    public function text($name, $value = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::text($name, $value, $options);
        return $this;
    }
    public function input($type, $name, $value = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::input($type, $name, $value, $options);
        return $this;
    }
    public function password($name, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::password($name, $options);
        return $this;
    }
    public function email($name, $value = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::email($name, $value, $options);
        return $this;
    }
    public function url($name, $value = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::url($name, $value, $options);
        return $this;
    }
    public function file($name, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::file($name, $options);
        return $this;
    }
    public function textarea($name, $value = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::textarea($name, $value, $options);
        return $this;
    }
    public function number($name, $value = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::number($name, $value, $options);
        return $this;
    }
    public function select($name, $list = array(), $selected = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::select($name, $list, $selected, $options);
        return $this;
    }
    public function selectRange($name, $begin, $end, $selected = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::selectRange($name, $begin, $end, $selected, $options);
        return $this;
    }
    public function checkbox($name, $value = 1, $checked = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::checkbox($name, $value, $checked, $options);
        return $this;
    }
    public function radio($name, $value = null, $checked = null, $options = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::radio($name, $value, $checked, $options);
        return $this;
    }
    public function image($url, $name = null, $attributes = array()) {
        $options['id'] = !isset($options['id']) ? $name : $options['id'];
        $this->tags['{!! tag_name !!}'] = $name;
        $this->tags['{!! tag !!}'] = Form::image($url, $name, $attributes);
        return $this;
    }
    public function submit($value = null, $options = array()) {
        $this->tags['{!! tag_name !!}'] = $value;
        $this->tags['{!! tag !!}'] = Form::submit($value, $options);
        return $this;
    }
    public function button($value = null, $options = array()) {
        $this->tags['{!! tag_name !!}'] = $value;
        $this->tags['{!! tag !!}'] = Form::button($value, $options);
        return $this;
    }
    public function error($errors, $message = '<span class="error">:message</span>') {
        $this->tags['{!! error-first !!}'] = $errors->first(str_replace('[]', '', $this->tags['{!! tag_name !!}']), $message);
        $this->tags['{!! error-has !!}'] = $errors->has(str_replace('[]', '', $this->tags['{!! tag_name !!}'])) ? 'has-error' : '';
        return $this;
    }
    public function helpBlock($message = '', $template = '<span class="help-block">:message</span>') {
        $this->tags['{!! help-block !!}'] = str_replace(':message', $message, $template);
        return $this;
    }
    public function tags($name = '', $value = null) {
        if (!empty($value)) {
            $this->tags['{!! ' . $name . ' !!}'] = $value;
        }
        return $this;
    }
    public function label($value = null, $options = array()) {
        $this->tags['{!! label !!}'] = HTML::decode(Form::label($this->tags['{!! tag_name !!}'], $value, $options));
        return $this;
    }
    public function __toString() {
        $string = str_replace(array_keys($this->tags), $this->tags, $this->template);
        $this->tags = array_map(function() {
            return null;
        }, $this->tags);
        return $string;
    }


}
