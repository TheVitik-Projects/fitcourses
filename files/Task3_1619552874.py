class Node:
    def __init__(self,data,x,y,z):
        self.data=data
        self.x=x
        self.y=y
        self.z=z
class Sparse3DList:
    def __init__(self,nodes=None):
        self.nodes=nodes
        if nodes is not None:
            node = Node(data=nodes.pop(0))
            self.head = node
            for i in nodes:
                node.next = Node(data=i)
                node = node.next
    def __repr__(self):
        node = self.head
        nodes = []
        while node is not None:
            nodes.append(node.data)
            node = node.next
        nodes.append("None")
        return " - ".join(nodes)
    def findNode(self,x,y,z):
        for node in self.nodes:
            if node.x==x and node.y==y and node.z==z:
                return node
        return None
    def add(self,node):
        self.nodes.append(node)
    def set(self,data,x,y,z):
        node=Node(findNode(x,y,z))
        if node is None:
            add(Node(data,x,y,z))
        else:
            node.data=data
    def get(self,x,y,z):
        node=Node(findNode(x,y,z))
        if node is None:
            return None
        else:
            return node.data
    def sort(self):
        nodes=self.nodes
        for i in range(len(nodes)-1):
            for j in range(len(nodes)-i-1):
                if nodes[j].data>nodes[j+1].data:
                    nodes.[j],nodes[j+1]=nodes[j+1],nodes[j]
    
