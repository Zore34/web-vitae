# web-vitae
A content manager based on showing personal projects, working experiences and knowledge

It's not inteded to be very adaptable. Just a few sections where you can put your CV data. The only customizable parts could be visual style and maybe element layout in the sections.

The default sections are (not necessarily in this order):
- Personal data and professional profile
- Working experience
- Education and knowledge
- Personal projects

Any working experience and personal project can be linked to any knowledge to indicate in which grade that experience have helped you to improve that knowledge.

It doesn't use a database because it's only intended to be edited by the owner. Without concurrent writes, there's no need of transactions, so data can be stored in much faster raw files.
