<?php 

class ServerGen

{
	public static $first;
	public static $second;
    public static $adjectives = ['spherical', 'malevolant', 'perpetual', 'swanky', 'boisterous', 'nonchalant', 'volatile', 'ambiguous', 'nimble', 'sophisticated'];
	public static $nouns = ['flamingo', 'macaroni', 'banjo', 'underclothes', 'ashtray', 'rhinoceros', 'molcajete', 'pagoda', 'pinecone', 'albatross'];

	public static function randomWordPicker($array)
	{
		shuffle($array);
		$newWord = $array[0];
		return $newWord;
	}

	public static function nameAssembler()
	{
		$servArray = [];
	    $word1 = self::randomWordPicker(self::$adjectives);
	    $word2 = self::randomWordPicker(self::$nouns);
	    $serverWords = $word1."-".$word2;
	    $servArray = ['serverName' => $serverWords];
		return $servArray;
	}
}


 ?>