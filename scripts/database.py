import MySQLdb

def getConnection():
        pdb = MySQLdb.connect(
                #host="localhost",
                #port=3306,
                #user= "admintocanaansql",
                #passwd= "y2k@OvhVps7;",
                #db= "tocanaan-alpha",
                #charset= "utf8"
                host="localhost",
                port=3306,
                user="root",
                passwd="",
                db="tocanaan-alpha",
                charset="utf8"
        )
        pdb.autocommit(True)
        pcur = pdb.cursor(MySQLdb.cursors.DictCursor)
        pcurSS = pdb.cursor(MySQLdb.cursors.SSDictCursor)
        return pdb, pcur, pcurSS

db, cur, curSS = getConnection()
