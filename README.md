# Recursive models issue
This repo outlines an issue with serializing models that reference each other when serializing for a job

##models
### Book
- Any time of book. 
#### References
a book contains a reference to the shelf it is located on

### Shelf 
- a shelf that is in some arbitrary bookcase. The shelf contains a reference to a "dictionary" which is a book on the same shelf that somehow indicates the correct order of the other books on the shelf
- I wanted it to be called the index. but thought that might confuse readers of this model

## Setup
`sail up -d` and then `sail artisan migrate:fresh`

You can run
`sail artisan success:it`
you will see
```
You should read the word "dispatched" after the contructor
"constructing ReOrderShelfWithIds"
"handled ReOrderShelfWithIds"
dispatched
```

if you run 
`sail artisan break:it`
You will see 
```
You should read the word "dispatched" after the constructor
"constructing ReOrderShelfWithPublicProperties"
```

The break:it command _should_ output ```dispatched ReOrderShelfWithPublicProperties``` but does not.

In another project, xdebug throws me a message about detecting an infinite loop
but for some reason in this project, the job simply stops in the constructing phase
