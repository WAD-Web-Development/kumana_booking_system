<?php

namespace domain\Services;

use App\Models\EmailAttachment;

class EmailAttachmentService
{
    protected $emailAttachment;

    public function __construct()
    {
        $this->emailAttachment = new EmailAttachment();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->emailAttachment->all();
    }

    public function first()
    {
        return $this->emailAttachment->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->emailAttachment->find($id);
    }

    public function store($data)
    {
        $emailAttachment = $this->emailAttachment->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'file_path' => $data['file_path'] ?? null,
        ]);
    }

    public function update($id, $data)
    {
        $this->get($id)->update($data);
    }

    public function destroy($id)
    {

        $dataRow = $this->get($id);
        if ($dataRow) {
            $dataRow->delete();
        }
    }
}
