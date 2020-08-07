<?php

namespace App\Console\Commands;

use App\Services\ExternalPostInterface;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Console\Command;
use Log;

class SaveExternalPost extends Command
{
    private $postExternal;
    private $postRepository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:externalpost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will save the external post into database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepositoryInterface $postRepository, ExternalPostInterface $postExternal)
    {
        parent::__construct();
        $this->postExternal     = $postExternal;
        $this->postRepository   = $postRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try{

            $posts = $this->postExternal->getPosts();

            if(count($posts) > 0){
    
                foreach($posts as $post){
                    $post->user_id = 1;
                    $this->postRepository->create((array) $post);
                }
                
            }
            Log::info('Save External Post, Succesfully');

        }catch(Exception $e){
            Log::info($e);
        }
    }
}
