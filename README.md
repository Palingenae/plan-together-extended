# PlanTogether "Revamp"
## Description

Rebuilding the original [Lugdu84/PlanTogether](https://github.com/Lugdu84/plan-together) app. A group project originally build with 
- NextJS,
- TailwindCSS,
- NextAuth,
- Prisma,
- Neon (Serverless PGSQL)
- Yup forms.

## Why rebuild?
Some choices have been made, and I'd like to revisit some choices and try to build something that goes further, in a different way, on a concept that I originally liked, that also might respond to a need.

This time the stack will be:
- Back-End / API :
  - Symfony
    - Security
    - Authentication
  - MariaDB
- Front-End / Web App :
  - NextJS
  - Sass/Scss
  - CSS Modules

This split is mostly to bring a new level of modularity, which would bring the ability for a native app.