<?php
    class Pagination{
        protected $config = array(
            'current_page' => 1,
            'total_record' => 1,
            'total_page' => 1,
            'limit' => 0,
            'range' => 1,
            'min' => 0,
            'max' => 1,
            'start' => 0,
            'link_first' => '',
            'link_full' => '',
        );

        function get_config($_parameter)
        {
            return $this->config[$_parameter];
        }
        function init($_config = array())
        {
            foreach ($_config as $key => $value)
            {
                if(isset($this->config[$key])){
                    $this->config[$key] = $value;
                }
            }

            $this->config['total_page'] = ceil($this->config['total_record']/$this->config['limit']);
            $this->config['start'] = ($this->config['current_page']-1)*$this->config['limit'];

            $middle = ceil($this->config['range'] / 2);

            if ($this->config['total_page'] < $this->config['range']){
                $this->config['min'] = 1;
                $this->config['max'] = $this->config['total_page'];
            }
            else{
                $this->config['min'] = $this->config['current_page'] - $middle + 1;

                $this->config['max'] = $this->config['current_page'] + $middle - 1;

                if ($this->config['min'] < 1){
                    $this->config['min'] = 1;
                    $this->config['max'] = $this->config['range'];
                }

                else if ($this->config['max'] > $this->config['total_page'])
                {
                    $this->config['max'] = $this->config['total_page'];
                    $this->config['min'] = $this->config['total_page'] - $this->config['range'] + 1;
                }
            }
        }

        function get_link($page)
        {
            if($page == 1)
            {
                return $this->config['link_first'];
            }
            return str_replace('{page}', $page, $this->config['link_full']);
        }

        function html()
        {
            $p = '';
            if($this->config['total_page'] > 1)
            {
                $p = "<ul class='pagination'>";
                if($this->config['current_page'] > 1)
                {
                    $p .= '<li><a href="'.$this->get_link('1').'">First</a></li>';
                    $p .= '<li><a href="'.$this->get_link($this->config['current_page']-1).'">Prev</a></li>';
                }
                for($i=$this->config['min'];$i <= $this->config['max'];$i++)
                {
                    if($this->config['current_page'] == $i)
                    {
                        $p .= "<li><span><a>$i</a></span></li>";
                    }
                    else{
                        $p .= '<li><a href="'.$this->get_link($i).'">'.$i.'</a></li>';
                    }
                }
                if ($this->config['current_page'] < $this->config['total_page'])
                {
                    $p .= '<li><a href="'.$this->get_link($this->config['current_page'] + 1).'">Next</a></li>';
                    $p .= '<li><a href="'.$this->get_link($this->config['total_page']).'">Last</a></li>';
                }
                $p .= "</ul>";
            }
            
            return $p;
        }

    }
?>