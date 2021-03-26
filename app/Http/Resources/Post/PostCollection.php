<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            //resource sebelumnya bisa digunakan di sini untuk memfilter data sama seperti sebelumnya
            //dengan menggunakan static method ::, karena resource nya ada di folder yang sama
            // maka kita tidak perlu mengingklud kan kelas tersebut ke dalam kelas ini

            // 'data'    => $this->collection
            'data' => PostResource::collection($this->collection),
            'meta' =>$this->collection->count()
        ];
    }
}
