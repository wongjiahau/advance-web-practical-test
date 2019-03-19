# Things done

## Q1(b)
```sh
php artisan preset react
```


## Q1(c)
Create migrations definition
```
php artisan make:migration create_parties_table --create=parties
php artisan make:migration create_candidates_table --create=candidates
```

Run the migration.
```
php artisan migrate
```

## Q1(d) 
First, create models:

```
php artisan make:model Party
php artisan make:model Candidate
```

Then, update `DatabaseSeeder.php`

Lastly, seed the tables:

```
php artisan db:seed
```

## Q2(a)
Update `Party.php` and `Candidates.php`

## Q2(b)
```
php artisan make:resource PartyResource
php artisan make:resource CandidateResource
php artisan make:resource PartyCollection
php artisan make:resource CandidateCollection
```

## Q2(c)
```
php artisan make:controller PartyController
php artisan make:controller CandidateController
```
Testing Q2(c) with HTTPie
```sh
### Retrieving all candidates
http GET    http://localhost:8000/api/candidates

### Retrieving specific candidate
http GET    http://localhost:8000/api/candidates/1

### Creating new candidate
echo '{"name":"New Candidate", "party_id": 3}' | http POST http://localhost:8000/api/candidates

### Updating candidate
echo '{"name":"updated Candidate", "party_id": 2}' | http PUT http://localhost:8000/api/candidates/6
```


## Q3(a) & 3(b)
Create a web controller
```
php artisan make:controller WebController
```

Rename file `Example.js` to `Candidate.js`.

Create file `index.blade.php` and `single.blade.php`.

To test the webpage, goto 

- http://localhost:8000/candidates/

- http://localhost:8000/candidates/2



