<?php namespace Nhoma\Product\Models;

use Foostart\Category\Library\Models\FooModel;
use Illuminate\Database\Eloquent\Model;

class Product extends FooModel {

    /**
     * @table categories
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {
        //set configurations
        $this->setConfigs();

        parent::__construct($attributes);

    }

    public function setConfigs() {

        //table name
        $this->table = 'products';

        //list of field in table
        $this->fillable = [
            'name',
            'description',
            'price',
            'cate_id',
        ];

        //list of fields for inserting
        $this->fields = [
            'name' => [
                'name' => 'name',
                'type' => 'Text',
            ],
            'description' => [
                'name' => 'description',
                'type' => 'Text',
            ],
            'price' => [
                'name' => 'price',
                'type' => 'Text',
            ],
        
            'cate_id' => [
                'name' => 'cate_id',
                'type' => 'Text',
            ],
        ];

        //check valid fields for inserting
        $this->valid_insert_fields = [
            'name',
            'description',
            'price',
            'cate_id',
        ];

        //check valid fields for ordering
        $this->valid_ordering_fields = [
            'name',
            'updated_at',
            $this->field_status,
        ];
        //check valid fields for filter
        $this->valid_filter_fields = [
            'keyword',
            'status',
        ];

        //primary key
        $this->primaryKey = 'id';

        //the number of items on page
        $this->perPage = 10;

        //item status
        $this->field_status = 'status';

    }

    /**
     * Gest list of items
     * @param type $params
     * @return object list of categories
     */
    public function selectItems($params = array(), $key = NULL, $value = NULL) {

        //join to another tables
        $elo = $this->joinTable($params);

        //search filters
        $elo = $this->searchFilters($params, $elo);
      
        //select fields
        $elo = $this->createSelect($elo);

        //order filters
        $elo = $this->orderingFilters($params, $elo);

        //paginate items
        $items = $this->paginateItems($params, $elo);

        return $items;
    }

    /**
     * Get a product by {id}
     * @param ARRAY $params list of parameters
     * @return OBJECT product
     */
    public function selectItem($params = array(), $key = NULL) {

        if (empty($key)) {
            $key = $this->primaryKey;
        }

       //join to another tables
        $elo = $this->joinTable($params);

        //search filters
        //$elo = $this->searchFilters($params, $elo, FALSE);
        
        //select fields
        $elo = $this->createSelect($elo);

        //id
        $elo = $elo->where($this->table.'.'.$this->primaryKey, $params['id']);
             
        //first item
        $item = $elo->first();

        return $item;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    protected function joinTable(array $params = []){
        $elo = $this;       
        
        $elo = $elo->join('product_categories', 'products.cate_id', '=', 'product_categories.id');

        return $elo;
        //return $this;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    protected function searchFilters(array $params = [], $elo, $by_status = TRUE){

        //filter
        // dd($this->isValidFilters($params) || (!empty($params)));
        if (!empty($params))
        {
            foreach($params as $column => $value)
            {
                if($this->isValidValue($value))
                {
                    switch($column)
                    {
                        case 'name':
                        
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.name', '=', $value);
                        
                            }
                            break;
                        case 'status':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.'.$this->field_status, '=', $value);
                                
                            }
                            break;
                        case 'keyword':
                            if (!empty($value)) {
                                $elo = $elo->where(function($elo) use ($value) {
                                    $elo->where($this->table . '.name', 'LIKE', "%{$value}%")
                                    ->orWhere($this->table . '.description','LIKE', "%{$value}%")
                                    ->orWhere($this->table . '.price','LIKE', "%{$value}%");
                                });
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
        } elseif ($by_status) {
            // $elo = $elo->where($this->table . '.'.$this->field_status, '=', $this->status['publish']);
            
            // $products = $elo->get()->toArray();
            // return $products;
            //dd($elo);

        }

        return $elo;
    }

    /**
     * Select list of columns in table
     * @param ELOQUENT OBJECT
     * @return ELOQUENT OBJECT
     */
    public function createSelect($elo) {

        $elo = $elo->select($this->table . '.*',
                    $this->table . '.id as id',
                    'product_categories.name as cate_name'
                );

        return $elo;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    public function paginateItems(array $params = [], $elo) {
        $items = $elo->paginate($this->perPage);

        return $items;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @param INT $id is primary key
     * @return type
     */
    public function updateItem($params = [], $id = NULL) {

        if (empty($id)) {
            $id = $params['id'];
        }

        $field_status = $this->field_status;

        $product = $this->selectItem($params);
        
        if (!empty($product)) {

            $dataFields = $this->getDataFields($params, $this->fields);
         
            foreach ($dataFields as $key => $value) {
                $product->$key = $value;
            }

            $product->$field_status = $this->status['publish'];

            $product->save();

            return $product;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return OBJECT product
     */
    public function insertItem($params = []) {

        $dataFields = $this->getDataFields($params, $this->fields);

        $dataFields[$this->field_status] = $this->status['publish'];

        $item = self::create($dataFields);

        $key = $this->primaryKey;
        $item->id = $item->$key;

        return $item;
    }

    /**
     *
     * @param ARRAY $input list of parameters
     * @return boolean TRUE incase delete successfully otherwise return FALSE
     */
    public function deleteItem($input = [], $delete_type) {

        $item = $this->find($input['id']);

        if ($item) {
            switch ($delete_type) {
                case 'delete-trash':
                    return $item->fdelete($item);
                    break;
                case 'delete-forever':
                    return $item->delete();
                    break;
            }

        }

        return FALSE;
    }

}