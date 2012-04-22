<!-- File: /app/View/Deeds/review.ctp -->
<div>
	<h1>Deed Preview</h1>
    <p>Congratulations! Below is a preview of your deed. Click "Share it" to spread the word about your Deed.</p>
</div>
<a href="/deeds/edit/<?=$deed['Deed']['id']?>">edit</a> | <a href="/deeds/delete/<?=$deed['Deed']['id']?>">delete</a>

<h1>Help, <?=$user['User']['first_name']?> with his deed!</h1>
<p>Your Friend, Ben needs a favor. Around here we call it a deed. Deedsy is a good deed engine. Earn points for doing good deeds. You can start here by accepting Ben's deed!</p>

<div>
    <div>
        <h2><?=$deed['Deed']['name']?></h2>
    </div>
    <div>
    	<p><?=$deed['Deed']['description']?></p>
    </div>
    <div>
    	+<?=$deed['Deed']['value']?>
    </div>
    <div>
    	<div>Earn +<?=$deed['Deed']['value']?> points</div>
        <a href="/deeds/claimDeed/<?=$deed['Deed']['id']?>">I'll do it</button>
    </div>
</div>