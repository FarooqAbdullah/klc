# centrality
Some important notes.
# Setup the Repo into your local machine :
    - Install GIT client (CLI) into your machine and Open the git bash
    - Click on Code button on top right section of this page
    - Then copy "HTTPS clone URL from top right section of this page"
    - Navigate to your working directory. E.g:
        - Windows /xampp/htdocs/ or /wamp/www/
        - Linux /var/www or /opt/lampp/htdocs/
    - open git bash using right click
    - type "git clone " and paste the url you have copied then press enter.
    - using Git bash navigate into the directory you have cloned.
    - Check your branch :
        -  type "git branch" (It will show your branch name)
    - if branch name is not "developer"
        - change your branch using command
            - git checkout -b developer (git checkout -b newBranch)

    > Congrates ! you have successfully complete your setup.

# Git Basics :
    - Git status (to check your working status, what you have doen yet)
    - git add (to add your modifications on existing files or to add new files or directories)
    - git commit (to commit your changes to git repo)
    - git rm (to delete files from repo)
    - git pull (to get the latest server code)
    - git push (to upload your changes into repo)

    > for more visit : https://git-scm.com/documentation

# Git Flow :
    - before start working do git pull so that you have latest code.
    - if merge conflicts occur :
            - Resolve conflict first
    - start your work
    - after complete a day work (or when you want to push your code to server) do git status
    - it will show you the changes you have done
    - do git add to add your changes
    - do git commit to commit your changes to repo. E.g :
        - git commit -m "write comment about your changes"
    - do git pull again (just for check if any collaborator of this project has updated the repo)
    - if merge conflicts occur :
        - Resolve conflict and again do commit (git commit -m "Fixed Conflicts")
    - do git push to upload your changes to the repo
