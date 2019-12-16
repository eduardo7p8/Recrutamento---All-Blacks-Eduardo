<?php

namespace App\Controller;

use App\Controller\AppController;
use DOMDocument;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {


        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
    }


    /**
     * Mail method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function mail()
    {

        require_once('PHPMailer.php');



        $clientes = $this->Clientes->cliente();




        $this->set(compact('clientes'));
    }









    /**
     * Mail method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */








    public function mailenv()
    {
        $emails = $this->request->getData();
        // pr($emails);
        // exit;
        //$emails =  $emails['cliente'];
        foreach ($emails['cliente'] as $email) {
            require_once('PHPMailer.php');

            $mail = new PHPMailer();

            $mail->IsSMTP();

            //configuração do gmail
            $mail->Port = '465'; //porta usada pelo gmail.
            $mail->Host = 'smtp.gmail.com';
            $mail->IsHTML(true);
            $mail->Mailer = 'smtp';
            $mail->SMTPSecure = 'ssl';

            //configuração do usuário do gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'desenvolvedorteste7p8@gmail.com'; // usuario gmail.   
            $mail->Password = SECRET; // senha do email.

            $mail->SingleTo = true;

            // configuração do email a ver enviado.
            $mail->From = "desenvolvedorteste7p8@gmail.com";
            $mail->FromName = "All Backs";

            $mail->addAddress($email); // email do destinatario.

            $mail->Subject = $emails['Subject'];
            $mail->Body = $emails['Body'];
        }


        if (!$mail->Send()) {
            echo "Erro ao enviar Email:" . $mail->ErrorInfo;
        } else {
            $this->Flash->success(__('E-mail enviado com sucesso'));
            return $this->redirect(['controller' => 'Clientes', 'action' => 'mail']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => [],
        ]);

        $this->set('cliente', $cliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('
O cliente foi salvo com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o cliente. Por favor, tente novamente.'));
        }
        $this->set(compact('cliente'));
    }
    public function atualizacliente()
    {
        $cliente = $this->Clientes->newEntity();

        $this->set(compact('cliente'));
    }




    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('
O cliente foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o cliente. Por favor, tente novamente.'));
        }
        $this->set(compact('cliente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('
O cliente foi excluído.'));
        } else {
            $this->Flash->error(__('
Não foi possível excluir o cliente. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }







    public function atualizaclientexml()
    {


        require_once("db.php");
        $data = array();

        //$db =& DB::connect("mysql://root@localhost/names", array());

        if ($_FILES['file']['tmp_name']) {
            $dom = DOMDocument::load($_FILES['file']['tmp_name']);
            $rows = $dom->getElementsByTagName('Row');
            $first_row = true;

            foreach ($rows as $row) {
                if (!$first_row) {
                    $nome = '';
                    $documento = '';
                    $cep = '';
                    $endereco = '';
                    $bairro   = '';
                    $cidade   = '';
                    $uf = '';
                    $telefone = '';
                    $email = '';
                    $ativo   = '';

                    $index = 1;
                    $cells = $row->getElementsByTagName('Cell');
                    foreach ($cells as $cell) {
                        $ind = $cell->getAttribute('Index');
                        if ($ind != null) $index = $ind;

                        if ($index == 1) $nome = $cell->nodeValue;
                        if ($index == 2) $documento = $cell->nodeValue;
                        if ($index == 3) $cep = $cell->nodeValue;
                        if ($index == 4) $endereco = $cell->nodeValue;
                        if ($index == 5) $bairro = $cell->nodeValue;
                        if ($index == 6) $cidade = $cell->nodeValue;
                        if ($index == 7) $uf = $cell->nodeValue;
                        if ($index == 8) $telefone = $cell->nodeValue;
                        if ($index == 9) $email  = $cell->nodeValue;
                        if ($index == 10) $ativo = $cell->nodeValue;

                        $index += 1;
                    }

                    $db = @mysql_connect('localhost', 'root', '') or die(mysql_error());
                    mysql_select_db('all-backs', $db);



                    $query = sprintf(
                        'INSERT INTO clientes VALUES( "", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s","%s",now(),now(),"1", "S" )',
                        mysql_real_escape_string($nome),
                        mysql_real_escape_string($documento),
                        mysql_real_escape_string($cep),
                        mysql_real_escape_string($endereco),
                        mysql_real_escape_string($bairro),
                        mysql_real_escape_string($cidade),
                        mysql_real_escape_string($uf),
                        mysql_real_escape_string($telefone),
                        mysql_real_escape_string($email),
                        mysql_real_escape_string($ativo)
                    );


                    mysql_query($query, $db);


                    $data[] = array(
                        'nome' => $nome,
                        'documento' => $documento,
                        'cep' => $cep,
                        'endereco' => $endereco,
                        'bairro' => $bairro,
                        'cidade' => $cidade,
                        'uf' => $uf,
                        'telefone' => $telefone,
                        'email' => $email,
                        'ativo' => $ativo
                    );
                }
                $first_row = false;
            }
            return $this->redirect(['action' => 'index']);
        }
    }
}
