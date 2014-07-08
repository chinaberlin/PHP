<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-4
 * Time: 下午3:40
 */
namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;

class AlbumTable extends TableGateway
{

    public function getAll()
    {
        return $this->select();
    }

    public function deleteById($id)
    {
        return $this->delete(['id' => $id]);
    }

    public function getOneById($id)
    {
        return $this->select(['id' => $id])->current();
    }

    public function saveAlbum(Album $album)
    {

        $albumData = $album->getArrayCopy();

        $id = (int)$albumData['id'];

        if ($id) {
            return $this->update($albumData, ['id' => $id]);
        } else {
            return $this->insert($albumData);
        }

    }

}