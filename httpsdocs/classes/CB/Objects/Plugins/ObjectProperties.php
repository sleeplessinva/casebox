<?php

namespace CB\Objects\Plugins;

use CB\Objects;

class ObjectProperties extends Base
{
    public function getData($id = false)
    {
        $rez = array(
            'success' => true
        );
        parent::getData($id);

        $preview = Objects::getPreview($this->id);
        $data = Objects::getCachedObject($this->id)->getData();

        if (!empty($preview)) {
            $rez['data'] = array(
                'html' => $preview
            );
        }

        if (!empty($data)) {
            foreach ($data as $k => $v) {
                if (in_array(
                    $k,
                    array(
                        'id'
                        ,'name'
                        ,'template_id'
                        ,'date'
                        ,'date_end'
                        ,'cid'
                        ,'cdate'
                        ,'can'
                    )
                )) {
                    $rez['data'][$k] = $v;
                }
            }
        }

        return $rez;
    }
}
