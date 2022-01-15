<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Library extends CI_Controller {

    /**
     * This controller is using for control library
     *
     * Maps to the following URL
     * 		http://example.com/index.php/library
     * 	- or -  
     * 		http://example.com/index.php/library/<method_name>
     */
    public function __construct() {
        parent::__construct();
        $this->lang->load('auth');
        $this->load->model('librarymodel');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    //This function is using to add books category and sub-category for library.
    public function addBookCategory() {
        if ($this->input->post('submit', TRUE)) {
            $user = $this->ion_auth->user()->row();
            $data_insert = array(
                'category_title' => $this->db->escape_like_str($this->input->post('category', TRUE)),
                'description' => $this->db->escape_like_str($this->input->post('description', TRUE)),
                'parent_category' => $this->db->escape_like_str($this->input->post('parent_category', TRUE)),
                'category_creator' => $this->db->escape_like_str($user->username)
            );
            $result = $this->db->insert('books_category', $data_insert);
            if ($result) {
                $data['category'] = $this->common->getAllData('books_category');
                $this->load->view('temp/header');
                $this->load->view('allBooksCategory', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['category'] = $this->common->getAllData('books_category');
            $this->load->view('temp/header');
            $this->load->view('addBookCategory', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function is showing all books category and sub category 
    public function allBooksCategory() {
        $data['category'] = $this->common->getAllData('books_category');
        $this->load->view('temp/header');
        $this->load->view('allBooksCategory', $data);
        $this->load->view('temp/footer');
    }

    //This function is edit and update the category informations.
    public function editCategory() {
        $id = $this->input->get('id');
        if ($this->input->post('submit', TRUE)) {
            $category = $this->input->post('category', TRUE);
            $description = $this->input->post('description', TRUE);
            $parentCategory = $this->input->post('parent_category', TRUE);
            $editData = array(
                'category_title' => $this->db->escape_like_str($category),
                'description' => $this->db->escape_like_str($description),
                'parent_category' => $this->db->escape_like_str($parentCategory)
            );
            $this->db->where('id', $id);
            if ($this->db->update('books_category', $editData)) {
                redirect('library/allBooksCategory', 'refresh');
            }
        } else {
            $data['category'] = $this->common->getAllData('books_category');
            $data['books'] = $this->common->getWhere('books_category', 'id', $id);
            $this->load->view('temp/header');
            $this->load->view('editCategory', $data);
            $this->load->view('temp/footer');
        }
    }

    //THis function is using to delete books category
    public function deleteCategory() {
        $id = $this->input->get('id');
        if ($this->db->delete('books_category', array('id' => $id))) {
            redirect('library/allBooksCategory', 'refresh');
        }
    }

    //This function will add books with books category.
    public function addBook() {
        if ($this->input->post('submit', TRUE)) {
            $user = $this->ion_auth->user()->row();
            $booksAmount = $this->librarymodel->booksAmount();
            $book_id = $this->librarymodel->books_id();
            //Here is uploading the student's photo.
            $config['upload_path'] = './assets/uploads/cover_photo';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $uploadFileInfo = $this->upload->data();
            $dataInsert = array(
                'date' => $this->db->escape_like_str(strtotime(date("d-m-Y"))),
                'isbn_no' => $this->db->escape_like_str($this->input->post('isbn_no', TRUE)),
                'book_no' => $this->db->escape_like_str($book_id),
                'books_title' => $this->db->escape_like_str($this->input->post('bookTitle', TRUE)),
                'authore' => $this->db->escape_like_str($this->input->post('bookAuthor', TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('booksCategory', TRUE)),
                'edition' => $this->db->escape_like_str($this->input->post('bookEdition', TRUE)),
                'language' => $this->db->escape_like_str($this->input->post('language', TRUE)),
                'pages' => $this->db->escape_like_str($this->input->post('pages', TRUE)),
                'uploderTitle' => $this->db->escape_like_str($user->username),
                'books_amount' => $this->db->escape_like_str($booksAmount),
                'status' => $this->db->escape_like_str('Available'),
                'cover_photo' => $uploadFileInfo['file_name'],
            );
            if ($this->db->insert('books', $dataInsert)) {
                redirect('library/allBook', 'refresh');
            }
        } else {
            //First time load the view for add book to library.
            $data['category'] = $this->common->getAllData('books_category');
            $this->load->view('temp/header');
            $this->load->view('addBook', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function load all books in this system.
    public function allBook() {
        $data['allBook'] = $this->common->getAllData('books');
        $data['category'] = $this->common->getAllData('books_category');
        $this->load->view('temp/header');
        $this->load->view('allBook', $data);
        $this->load->view('temp/footer');
    }

    //This function will Update the books information which was submited previously.
    public function editBook() {
        $id = $this->input->get('id');
        if ($this->input->post('submit', TRUE)) {
            $user = $this->ion_auth->user()->row();
            $booksAmount = $this->librarymodel->booksAmount();
            $dataUpdate = array(
                'isbn_no' => $this->db->escape_like_str($this->input->post('isbn_no', TRUE)),
                'books_title' => $this->db->escape_like_str($this->input->post('bookTitle', TRUE)),
                'authore' => $this->db->escape_like_str($this->input->post('bookAuthor', TRUE)),
                'edition' => $this->db->escape_like_str($this->input->post('bookEdition', TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('booksCategory', TRUE)),
                'pages' => $this->db->escape_like_str($this->input->post('pages', TRUE)),
                'language' => $this->db->escape_like_str($this->input->post('language', TRUE)),
            );
            $this->db->where('id', $id);
            if ($this->db->update('books', $dataUpdate)) {
                redirect('library/allBook', 'refresh');
            }
        } else {
            //First time load the view for add book to library.
            $data['category'] = $this->common->getAllData('books_category');
            $data['Book'] = $this->common->getWhere('books', 'id', $id);
            $this->load->view('temp/header');
            $this->load->view('editBooks', $data);
            $this->load->view('temp/footer');
        }
    }

    //THis function is using to delete the books
    public function deleteBook() {
        $id = $this->input->get('id');
        if ($this->db->delete('books', array('id' => $id))) {
            redirect('library/allBook', 'refresh');
        }
    }

    //This funtion will show creating librsry member
    public function add_library_member() {
        if ($this->input->post('submit', TRUE)) {
            $member_info = array(
                'user_id' => $this->db->escape_like_str($this->input->post('user_id', TRUE)),
                'title' => $this->db->escape_like_str($this->input->post('user_name', TRUE)),
            );
            if ($this->db->insert('library_member', $member_info)) {
                redirect('library/member_list', 'refresh');
            }
        } else {
            $this->load->view('temp/header');
            $this->load->view('add_lib_memb');
            $this->load->view('temp/footer');
        }
    }

    //This function will show the member list from
    public function member_info() {
        $user_type = $this->input->get('utp');
        if ($user_type == "Student") {
            $query = $this->db->query("SELECT user_id,student_id,student_nam FROM student_info");
            echo '<option value="">'.lang('lib_1').'</option>';
            foreach ($query->result_array() as $row) {
                echo'<option value="' . $row['user_id'] . '">' . $row['student_id'] . ' - ' . $row['student_nam'] . '</option>';
            }
        } elseif ($user_type == "Employee") {
            $query = $this->db->query("SELECT id,username FROM users WHERE user_status='Employee'");
            echo '<option value="">'.lang('lib_2').'</option>';
            foreach ($query->result_array() as $row) {
                echo'<option value="' . $row['id'] . '">' . $row['username'] . '</option>';
            }
        }
    }

    //This function will show user name and photo
    public function user_info() {
        $user_id = $this->input->get('uid');
        $query = $this->db->query("SELECT id,username,profile_image FROM users WHERE id = $user_id");
        foreach ($query->result_array() as $row) {
            echo '<div class="row"><div class="col-md-offset-2 col-md-7 stuInfoIdBox">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-md-4 control-label"> '.lang('lib_3').' <span class="requiredStar">  </span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="user_name" value="' . $row['username'] . '" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img src="assets/uploads/' . $row['profile_image'] . '" class="img-responsive" alt=""><br>
                    </div>
                </div></div>';
        }
    }

    //This function will show all laibrary member list
    public function member_list() {
        $data['member'] = $this->librarymodel->member_list();
        $this->load->view('temp/header');
        $this->load->view('memberlist', $data);
        $this->load->view('temp/footer');
    }

    //This function will issue the book into the library member
    public function issue_return() {
        $this->load->view('temp/header');
        $this->load->view('issu_return');
        $this->load->view('temp/footer');
    }

    //This function will give the book information for issue
    public function ajax_issue_book() {
        $data = array();
        $book_id_no = $this->input->get('bon');
        $query = $this->db->query("SELECT * FROM books WHERE book_no='$book_id_no'");
        foreach ($query->result_array() as $row) {
            $data['status'] = $row['status'];
            $data['title'] = $row['books_title'];
            $data['author'] = $row['authore'];
            $data['edition'] = $row['edition'];
            $data['language'] = $row['language'];
            $data['photo'] = $row['cover_photo'];
            $return_date = $row['due_date'];
        }
        if (!empty($data)) {
            if ($data['status'] == 'Available') {
                echo '<div class="alert alert-success alert-dismissable">
                        <strong>'.lang('lib_4').'</strong><hr>
                        <div>
                            <div class="lobraryImage">
                                <img src="assets/uploads/cover_photo/' . $data['photo'] . '" alt="">
                            </div>
                        </div>
                        <h4><b>' . $data['title'] . '</b></h4>
                        '.lang('lib_5').' : ' . $data['author'] . '<br>
                        '.lang('lib_6').' : ' . $data['edition'] . '<br>
                        '.lang('lib_7').' : ' . $data['language'] . '
                    </div>';
            } else {
                echo '<div class="alert alert-success alert-danger">
                                        <strong>'.lang('lib_8').'</strong><hr>
                                        <div>
                                            <div class="lobraryImage">
                                                <img src="assets/uploads/cover_photo/' . $data['photo'] . '" alt="">
                                            </div>
                                        </div>
                                        <h4><b>' . $data['title'] . '</b></h4>
                                        '.lang('lib_5').' : ' . $data['author'] . '<br>
                                        '.lang('lib_6').' : ' . $data['edition'] . '<br>
                                        '.lang('lib_7').' : ' . $data['language'] . '<br>
                                        '.lang('lib_9').' : ' . date('d/m/Y', $return_date) . '
                                </div>';
            }
        } else {
            echo '<div class="alert alert-block alert-danger fade in">
                                    <strong>'.lang('lib_10').'</strong> '.lang('lib_11').' 
                                </div>';
        }
    }

    //This function will give the member information 
    public function ajax_member_info() {
        $data = array();
        $member_no = $this->input->get('lmi');
        $query = $this->db->query("SELECT * FROM library_member WHERE id='$member_no'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        if (!empty($data)) {
            echo '<div class="alert alert-success alert-dismissable">
                                        <strong>'.lang('lib_12').' : </strong> ' . $data['0']['title'] . '
                                </div>';
        } else {

            echo '<div class="alert alert-block alert-danger fade in">
                                    <strong>'.lang('lib_13').'</strong> '.lang('lib_14').'
                                </div>';
        }
    }

    //This function will issu book only
    public function issue() {
        $book_no = $this->input->post('book_id', TRUE);
        $issu_date = strtotime("now");
        $date = $this->input->post('renue_date', TRUE);
        $due_date = strtotime($date);
        $issu_data = array(
            'status' => $this->db->escape_like_str('Not Available'),
            'issu_date' => $this->db->escape_like_str($issu_date),
            'due_date' => $this->db->escape_like_str($due_date),
            'issu_member_no' => $this->db->escape_like_str($this->input->post('member_id', TRUE)),
        );
        $this->db->where('book_no', $book_no);
        if ($this->db->update('books', $issu_data)) {
            $data['message_1'] = '<div class="alert alert-block alert-info fade in">
                                    <button data-dismiss="alert" class="close" type="button"></button>
                                    <h4 class="alert-heading">'.lang('lib_15').'</h4>
                            </div>';
            $this->load->view('temp/header');
            $this->load->view('issu_return', $data);
            $this->load->view('temp/footer');
        }
    }

    //This function will give the issued book info
    public function ajax_return_book() {
        $data = array();
        $current_time = strtotime("now");
        $book_id_no = $this->input->get('rbid');
        $query = $this->db->query("SELECT * FROM books WHERE book_no='$book_id_no' AND status='Not Available'");
        foreach ($query->result_array() as $row) {
            $data['status'] = $row['status'];
            $data['title'] = $row['books_title'];
            $data['author'] = $row['authore'];
            $data['edition'] = $row['edition'];
            $data['language'] = $row['language'];
            $data['photo'] = $row['cover_photo'];
            $return_date = $row['due_date'];
            $issu_date = $row['issu_date'];
            $member_id = $row['issu_member_no'];
        }
        if (!empty($data)) {
            if ($current_time <= $return_date) {
                echo '<div class="alert alert-success alert-dismissable">
                                    <strong>'.lang('lib_16').'</strong><hr>
                                    <div>
                                        <div class="lobraryImage">
                                            <img src="assets/uploads/cover_photo/' . $data['photo'] . '" alt="">
                                        </div>
                                    </div>
                                    <h4><b>' . $data['title'] . '</b></h4>
                                    '.lang('lib_5').' : ' . $data['author'] . '<br>
                                    '.lang('lib_6').' : ' . $data['edition'] . '<br>
                                    '.lang('lib_7').' : ' . $data['language'] . '<br>
                                    '.lang('lib_17').' : ' . date('d/m/Y', $issu_date) . '<br>
                                    '.lang('lib_9').' : ' . date('d/m/Y', $return_date) . '
                                </div>';
                echo '<input type="hidden" name="renue_date_2" value="' . $return_date . '">';
                echo '<input type="hidden" name="member_id_no" value="' . $member_id . '">';
            } else {
                echo '<div class="alert alert-success alert-danger">
                                        <strong>'.lang('lib_18').'</strong><hr>
                                        <div>
                                            <div class="lobraryImage">
                                                <img src="assets/uploads/cover_photo/' . $data['photo'] . '" alt="">
                                            </div>
                                        </div>
                                        <h4><b>' . $data['title'] . '</b></h4>
                                        '.lang('lib_5').' : ' . $data['author'] . '<br>
                                        '.lang('lib_6').' : ' . $data['edition'] . '<br>
                                        '.lang('lib_7').' : ' . $data['language'] . '<br>
                                        '.lang('lib_17').' : ' . date('d/m/Y', $issu_date) . '<br>
                                        '.lang('lib_9').' : ' . date('d/m/Y', $return_date) . '
                                </div>';
                echo '<input type="hidden" name="renue_date_2" value="' . $return_date . '">';
                echo '<input type="hidden" name="member_id_no" value="' . $member_id . '">';
            }
        } else {
            echo '<div class="alert alert-block alert-danger fade in">
                                    <strong>'.lang('lib_10').'</strong> '.lang('lib_19').' 
                                </div>';
        }
    }

    //This function will return this book
    public function return_book() {
        $book_no = $this->input->post('book_id', TRUE);
        $current_time = strtotime(date('d-m-Y'));
        if ($this->input->post('renue_date_2', TRUE)) {
            $due_date = $this->input->post('renue_date_2', TRUE);
            $member_id = $this->input->post('member_id_no', TRUE);

            $return_data = array(
                'status' => $this->db->escape_like_str('Available'),
                'issu_date' => $this->db->escape_like_str(''),
                'due_date' => $this->db->escape_like_str(''),
                'issu_member_no' => $this->db->escape_like_str(''),
            );

            if ($current_time <= $due_date) {
                $fine = 0;
            } else {
                $fine = 40;
            }
            $fine_data = array(
                'fine' => $this->db->escape_like_str($fine),
            );
            $this->db->where('book_no', $book_no);
            if ($this->db->update('books', $return_data)) {
                $this->db->where('id', $member_id);
                if ($this->db->update('library_member', $fine_data)) {
                    $data['message_2'] = '<div class="alert alert-block alert-info fade in">
                                        <button data-dismiss="alert" class="close" type="button"></button>
                                        <h4 class="alert-heading">'.lang('lib_20').'</h4>
                                </div>';
                    $this->load->view('temp/header');
                    $this->load->view('issu_return', $data);
                    $this->load->view('temp/footer');
                }
            }
        } else {
            $data['message_2'] = '<div class="alert alert-block alert-danger fade in">
                                        <button data-dismiss="alert" class="close" type="button"></button>
                                        <h4 class="alert-heading">'.lang('lib_21').'</h4>
                                </div>';
            $this->load->view('temp/header');
            $this->load->view('issu_return', $data);
            $this->load->view('temp/footer');
        }
    }
}
